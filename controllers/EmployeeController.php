<?php
/**
*@author        :Farsheel
*@Date          :08/06/2017
*@LastModified  :20/06/2017
*/
namespace app\controllers;

use Yii;
use app\models\TblEmployee;
use app\models\Model;
use app\models\ModelQ;
use app\models\ModelD;
use app\models\TblExperience;
use app\models\TblQualification;
use app\models\TblEmployeeDocuments;
use app\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;


/**
 * SiteController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
                'class' => AccessControl::className(),
                'only' => ['index,create,update,view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        $searchModel = new EmployeeSearch(); 
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); // Rendering the index page of employee that lists down employees
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        $model = new TblEmployee();
        $modelExperience=[new TblExperience];
        $modelQualification=[new TblQualification];
        $modelDocuments=[new TblEmployeeDocuments];
        $today=Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

        
        $model->date_modified=$today;





        if ($model->load(Yii::$app->request->post())) {
            {


            $password=$model->vchr_email.rand(1234,9876);

            $model->vchr_password=sha1($password);

            Yii::$app->mailer->compose()
            ->setFrom('no-reply@hrm.com')
            ->setTo($model->vchr_email)
            ->setSubject('New Registration')
            ->setTextBody('Registration is completed please use this password:'.$password)
            ->send();

            $modelExperience = Model::createMultiple(TblExperience::classname());
            $modelQualification = ModelQ::createMultiple(TblQualification::classname());
            $modelDocuments = ModelD::createMultiple(TblEmployeeDocuments::classname());

            Model::loadMultiple($modelExperience, Yii::$app->request->post());
            ModelQ::loadMultiple($modelQualification, Yii::$app->request->post());
            ModelD::loadMultiple($modelDocuments, Yii::$app->request->post());

                $model->file=UploadedFile::getInstance($model,'file');
                $rdm=rand(0,1008);
                $imageName="upload//$model->vchr_name$rdm$model->file";
                $model->file->saveAs($imageName);
                $model->vchr_profile_pic=$imageName;


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelExperience) && $valid;
            $valid= ModelQ::validateMultiple($modelQualification) && $valid;
            
                    if ($model->save(false)) {
                        foreach ($modelExperience as $modelExperience) {
                        
                            
                            $modelExperience->date_modified=$today;
                            $modelExperience->fk_int_emp_id = $model->pk_int_emp_id;
                            $modelExperience->save();

                        }
                        foreach ($modelQualification as $modelQualification) {
                           
                            $modelQualification->date_modified=$today;
                            $modelQualification->fk_int_emp_id = $model->pk_int_emp_id;
                            $modelQualification->save(false);
                            
                        }
                        foreach ($modelDocuments as $i=>$modelDocuments) {

                            if($_FILES['TblEmployeeDocuments']['name']["$i"]['file']!="")
                            {

                            $docName="upload/".$model->vchr_name.$rdm.$_FILES['TblEmployeeDocuments']['name']["$i"]['file'];
                           move_uploaded_file($_FILES['TblEmployeeDocuments']['tmp_name']["$i"]['file'], $docName);
                                                            
                            $modelDocuments->vchr_document=$docName;
                            }

                            
                            $modelDocuments->fk_int_emp_id = $model->pk_int_emp_id;
                            $modelDocuments->save(false);
                            
                        }
                        
                        return $this->redirect(['view', 'id' => $model->pk_int_emp_id]);


                    }

            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelExperience'=>$modelExperience,
                'modelQualification'=>$modelQualification,
                'modelDocuments'=>$modelDocuments,
            ]);
        }
    }



    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        $model = $this->findModel($id);

        
        $modelQualification= $model->tblQualifications;
        $modelExperience = $model->tblExperiences;
        $modelDocuments=$model->tblEmployeeDocuments;


        $today=Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

        if ($model->load(Yii::$app->request->post())) {
            

            $oldEIDs = ArrayHelper::map($modelExperience,'pk_int_exp_id','pk_int_exp_id');
            $modelExperience = Model::createMultiple(TblExperience::classname(), $modelExperience);
            Model::loadMultiple($modelExperience, Yii::$app->request->post());
            $deletedIDs = array_diff($oldEIDs, array_filter(ArrayHelper::map($modelExperience, 'pk_int_exp_id','pk_int_exp_id')));


            $oldQIDs = ArrayHelper::map($modelQualification,'pk_int_qualification_id','pk_int_qualification_id');
            $modelQualification = ModelQ::createMultiple(TblQualification::classname(), $modelQualification);
            ModelQ::loadMultiple($modelQualification, Yii::$app->request->post());
            $deletedQIDs = array_diff($oldQIDs, array_filter(ArrayHelper::map($modelQualification, 'pk_int_qualification_id','pk_int_qualification_id')));


            $oldDIDs = ArrayHelper::map($modelDocuments,'pk_int_document_id','pk_int_document_id');
            $modelDocuments = ModelD::createMultiple(TblEmployeeDocuments::classname(), $modelDocuments);
            ModelD::loadMultiple($modelDocuments, Yii::$app->request->post());
            $deletedDIDs = array_diff($oldDIDs, array_filter(ArrayHelper::map($modelDocuments, 'pk_int_document_id','pk_int_document_id')));


                $model->file=UploadedFile::getInstance($model,'file');
                if($model->file!=null)
                {
                $rdm=rand(0,1008);
                $imageName="upload//$model->vchr_name$rdm$model->file";
                $model->file->saveAs($imageName);
                $model->vchr_profile_pic=$imageName;
                }


            $valid = $model->validate();

            if ($valid) {
                

                    if ($model->save(false)) {

                        if (!empty($deletedIDs)) {

                            TblExperience::deleteAll(['pk_int_exp_id' => $deletedIDs]);

                        }


                        foreach ($modelExperience as $modelExperience) {
                            
                            $modelExperience->date_modified=$today;

                            $modelExperience->fk_int_emp_id = $model->pk_int_emp_id;

                            $modelExperience->save(false);

                        }


                        if (!empty($deletedQIDs)) {

                                        TblQualification::deleteAll(['pk_int_qualification_id' => $deletedQIDs]);

                        }                        

                        foreach ($modelQualification as $modelQualification) {                        
                            $modelQualification->date_modified=$today;

                            $modelQualification->fk_int_emp_id = $model->pk_int_emp_id;

                            $modelQualification->save(false);

                                //return $this->redirect(['view', 'id' => $model->pk_int_emp_id])
                            //print_r($modelQualification->geterrors);

                        }

                        if (!empty($deletedDIDs)) {

                                        TblEmployeeDocuments::deleteAll(['pk_int_document_id' => $deletedDIDs]);

                        }                        
                       // $i=0;
                        foreach ($modelDocuments as $i=>$modelDocuments) {

                            
                            $rdm=rand(0,1008);

                            if($_FILES['TblEmployeeDocuments']['name']["$i"]['file']!="")
                            {

                            $docName='upload\\'.$model->vchr_name.$rdm.$_FILES['TblEmployeeDocuments']['name']["$i"]['file'];
                           move_uploaded_file($_FILES['TblEmployeeDocuments']['tmp_name']["$i"]['file'], $docName);
                                                            
                            $modelDocuments->vchr_document=$docName;
                            }

                            
                            $modelDocuments->fk_int_emp_id = $model->pk_int_emp_id;
                            $modelDocuments->save(false);
                            //var_dump($_FILES);
                            //UploadedFile::getInstance($modelDocuments,'file')->getError();

                        }


                        return $this->redirect(['view', 'id' => $model->pk_int_emp_id]);
                        

            

                    }

            }

        }
        else
        {


        return $this->render('update', [

            'model' => $model,
            'modelExperience' =>(empty($modelExperience)) ? [new TblExperience] : $modelExperience,
            'modelQualification' =>(empty($modelQualification)) ? [new TblQualification] : $modelQualification,
            'modelDocuments'=>(empty($modelDocuments)) ? [new TblEmployeeDocuments] : $modelDocuments,

        ]);
    }


    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        if (($model = TblEmployee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEmployee()
    {
        Yii::$app->CheckAdmin->authCheck(); // Checking the admin is logged in or not

        return $this->redirect('/employee/web/index.php?r=user/index');
    }
}
