<?php

namespace app\controllers;

use Yii;
use app\models\TblSalaryMappingHistory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\db\Query;
use app\models\TblEmployee;
use app\models\TblSalaryMapping;
use app\models\TblSalaryParticular;
use yii\helpers\ArrayHelper;



/**
 * TblsalarymappinghistoryController implements the CRUD actions for TblSalaryMappingHistory model.
 */
class TblsalarymappinghistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblSalaryMappingHistory models.
     * @return mixed
     */
    public function actionIndex($id)
    {
      

/*extracting data from tbl_employee*/
        $model=TblEmployee::findOne($id);

/* getting data about curent salary details */
      $query=new Query;
        $dataProvider1 = new ActiveDataProvider([
          'query' =>$query
          ->select(['vchr_particular_name','int_value','tbl_salary_mapping.date_created']) 
            ->from('tbl_salary_mapping')
            ->join('INNER JOIN', 'tbl_salary_particular',
                'tbl_salary_particular.pk_int_particular_id =tbl_salary_mapping.fk_int_particular_id')          
     ->where(['tbl_salary_mapping.fk_int_emp_id'=>$id])
    ->groupBy(['vchr_particular_name','int_value'])
    

    ])  ;
$models=$dataProvider1->getModels();

/* getting data about history of salary details */
$query1=new Query;
$dataProvider2 = new ActiveDataProvider([
          'query' =>$query1
          ->select(['vchr_particular_name','int_amount','tbl_salary_mapping_history.date_created']) 
            ->from('tbl_salary_mapping_history')         
    ->join('INNER JOIN','tbl_salary_particular' ,'tbl_salary_particular.pk_int_particular_id  =tbl_salary_mapping_history.fk_int_perticular_id')
    ->where(['tbl_salary_mapping_history.fk_int_emp_id'=>$id])
    ->groupBy(['vchr_particular_name','int_amount'])
    

    ])  ;
 $models1=$dataProvider2->getModels();
 

        return $this->render('index'
            , ['model' => $model,'models'=>$models,'models1'=>$models1
     
        ]
        );
    }
 
    /**
     * Displays a single TblSalaryMappingHistory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        /*extracting data from tbl_employee*/
             $model1=TblEmployee::findOne($id);
       

        /*getting data from tbl_salary_mapping*/
        $dataProvider = new ActiveDataProvider([
            'query' => TblSalaryMapping::find()->where(['fk_int_emp_id'=>$id]),
        ]);

$model = new TblSalaryMapping();
$model3=new TblSalaryParticular();
$model2= ArrayHelper::map(TblSalaryParticular::find()->all(),'vchr_particular_name','vchr_particular_name');

        
        return $this->render('view', [
            'model1' =>$model1,'dataProvider'=>$dataProvider,'model' =>$model,
            'model2'=>$model2,'model3'=>$model3,
        ]);
    }

    /**
     * Creates a new TblSalaryMappingHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
      

     $post_data=Yii::$app->request->post();
    if($post_data['TblSalaryParticular']!=null && $post_data['TblSalaryMapping']!=null)
       {
        
        
               $particular=$post_data['TblSalaryParticular'];
        $value=$post_data['TblSalaryMapping'];
        $particular=$particular['vchr_particular_name'];
        $value=$value['int_value'];
        $model=TblSalaryParticular::find()->where(['vchr_particular_name'=>$particular])->one();
        $p_id=$model->pk_int_particular_id;


        $model1=TblSalaryMapping::find()->where(['fk_int_particular_id'=>$p_id,'fk_int_emp_id'=>$id])->one();
        
        $model2= new TblSalaryMappingHistory();
        $model2->fk_int_emp_id=$model1->fk_int_emp_id;
        $model2->fk_int_perticular_id=$model1->fk_int_particular_id;
        $model2->int_amount=$model1->int_value;
        $model2->date_created=$model1->date_created;
        $model2->date_modified=$model1->date_modified;
        $model2->save();


    $model1->int_value=$value;
    $model1->update();
       
       echo "the data is saved";

        
       }


        return $this->redirect(['view','id'=>$id]);
      

   
  }

    public function actionViewdata()
    {
        $model=new TblEmployee();

        $dataProvider1 = new ActiveDataProvider([
            'query' => TblEmployee::find()

    ])  ;
    



        return $this->render('viewdata' ,['dataProvider1' => $dataProvider1
       ,'model'=>$model]
        );
       
    }

    


}
