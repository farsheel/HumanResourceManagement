<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 18/6/17
*/


namespace app\controllers;

use Yii;
use app\models\TblSalaryMapping;
use app\models\TblSalaryMappingSearch;
use app\models\TblSalaryParticular;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\TblEmployee;
use yii\db\Query;


/**
 * SalaryMapController implements the CRUD actions for TblSalaryMapping model.
 */
class SalaryMapController extends Controller
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
     * Lists all TblSalaryMapping models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        $get_data_index=Yii::$app->request->get();
        $message = (isset($get_data_index['status'])) ? $get_data_index['status'] : 'not set' ;
        
        $query = new Query;
    //     $query = TblEmployee::find()
    // ->select(['pk_int_emp_id','vchr_name'])
    // ->leftJoin('tbl_salary_mapping', 'tbl_salary_mapping.fk_int_emp_id=tbl_employee.pk_int_emp_id')
    // ->groupBy('tbl_employee.pk_int_emp_id')
    // ->all();
    $query->select('pk_int_emp_id,vchr_name')
    ->from('tbl_employee')
    ->leftJoin('tbl_salary_mapping','tbl_salary_mapping.fk_int_emp_id=tbl_employee.pk_int_emp_id')
    ->groupBy('tbl_employee.pk_int_emp_id');
        



        //calculating total salary
        $dataProvider = new SqlDataProvider([
            'sql' =>$query->createCommand()->sql,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'message' => $message,
        ]);
    }

    /**
     * Displays a single TblSalaryMapping model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        //taking details of the salary mapping with the employee id
        $model=TblSalaryMapping::find()->where(['fk_int_emp_id' => $id])->orderBy(['fk_int_particular_id' => SORT_ASC]);
        //taking employee details from the id
        $name=TblEmployee::find()->where(['pk_int_emp_id' =>$id])->one();
        //getting particular type
        $particular_type = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_type');
        return $this->render('view', [
            'model' => $model,
            'name' => $name,
            'particular_type' => $particular_type,
        ]);
    }

    /**
     * Creates a new TblSalaryMapping model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        //getting employee names to display in create page combo box
        $employee_name=ArrayHelper::map(TblEmployee::find()->asArray()->all(), 'pk_int_emp_id', 'vchr_name');
        $model = new TblSalaryMapping();
        if ($model->load(Yii::$app->request->post())) {
             $post_data_create=Yii::$app->request->post();
             $aps=$post_data_create['TblSalaryMapping'];
             //taking employee id from the post data
             $emp_id=$aps['fk_int_emp_id'];
             foreach ($aps as $key => $value)
             {
                if($key!='fk_int_emp_id')
                {  
                    $value=$value['int_value'];
                    //checking if the record already exists or not
                    $record=TblSalaryMapping::findOne([
                    'fk_int_emp_id' => $emp_id,
                    'fk_int_particular_id' => $key,
                     ]);
                            //if the record doesn't exists create new one
                            if($record===null) {
                                        //creating object of TblSalaryMapping to create a new row
                                        $modelsmap=new TblSalaryMapping();
                                        //setting retrieved values to the TblSalaryMapping object
                                        $modelsmap->fk_int_emp_id=$emp_id;
                                        $modelsmap->fk_int_particular_id=$key;
                                        $modelsmap->int_value=$value;
                                        $modelsmap->date_created=new Expression('NOW()');
                                        $modelsmap->date_modified=new Expression('NOW()');
                                        $modelsmap->save(); 
                            }
                            else
                            {   
                                // echo "HI";
                                        //if the record does exists then update the row 
                                        $record->int_value=$value;
                                        $record->date_modified=new Expression('NOW()');
                                        $retVal = $record->update();
                            }
                }
            }

             // $model=TblSalaryMapping::find()->orderBy(['pk_int_salary_id' => SORT_DESC])->one();
              return $this->redirect('index.php?r=salary-map');
        } else {
        //taking particular name and id
        $items = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_particular_name');
        //getting particular type
        $particular_type = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_type');
            return $this->render('create', [
                'model' => $model,
                'items' => $items,
                'employee_name' => $employee_name,
                'particular_type' => $particular_type,
            ]);
        }
    }




    /**
     * It only redirects the page to update page with necessory data
     * @param integer $id
     */

    public function actionUpdate($id)
    {
       
       if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
		$model_clear_object=new TblSalaryMapping(); 
        //getting particular id and value of the employee
    	$array_particularid_value = ArrayHelper::map(TblSalaryMapping::find()->where(['fk_int_emp_id' => $id])->all(), 'fk_int_particular_id', 'int_value');

            //if there is no salary particular for the user
            if(sizeof($array_particularid_value)==0)
            {
                //then alert user 
                return $this->redirect('index.php?r=salary-map/index&status=fail');
            }

        //getting employee id for displaying in update page combo box
        $mapping_of_employee = TblSalaryMapping::find()->where(['fk_int_emp_id' => $id])->one();
        
        //getting employee id for displaying in update page combo box
        $employee_name = ArrayHelper::map(TblEmployee::find()->where(['pk_int_emp_id' => $id])->all(), 'pk_int_emp_id', 'vchr_name');
        //getting particular name and id for displaying in update view
        $particulars = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id','vchr_particular_name');
        //getting particular type
        $particular_type = ArrayHelper::map(TblSalaryParticular::find()->all(), 'pk_int_particular_id', 'vchr_type');

        
            return $this->render('update', [
                'array_particularid_value' => $array_particularid_value,
                'employee_name' => $employee_name,
                'mapping_of_employee' => $mapping_of_employee,
                'particulars' => $particulars,
                'id' => $id,
                'model_clear_object' => $model_clear_object,
                'particular_type' => $particular_type,
            ]);
    }





        /**
         * Updates an existing TblSalaryMapping model.
         * browser will be redirected to the 'view' page.
         * @return Mixed
         */

        public function actionBatchUpdate()
            {
                if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
                }
                    //geting post parameters to variable
                    $post_data=Yii::$app->request->post();

                    $post_salary_mapping=$post_data['TblSalaryMapping'];

                    //getting employee id from post data
                    $employee_id=$post_salary_mapping['fk_int_emp_id'];

                    foreach ($post_salary_mapping as $key => $value) {
                        if($key!='fk_int_emp_id')
                        {
                            if($value['int_value']!='')
                            {
                                //finding already existing row to update
                                $model=TblSalaryMapping::findOne(['fk_int_emp_id' => $employee_id,'fk_int_particular_id' => $key]);
                                if($model!=null)
                                {   
                                    //if row exists update the row
                                    $model->int_value=$value['int_value'];
                                    $model->date_modified=new Expression('NOW()');
                                    $model->update();
                                }
                                
                            }
                        }
                    }

                    return $this->redirect(['view', 'id' => $employee_id]);

            }





    /**
     * Deletes an existing TblSalaryMapping model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        //getting post parameters to array
        $post_array=Yii::$app->request->post();
        
        $salary_id=$post_array['id'];
        $employee_id=$post_array['emp_id'];
        //delete row with the provided salary id
        $this->findModel($salary_id)->delete();

        return $this->redirect(['view', 'id' => $employee_id]);

    }

    /**
     * Finds the TblSalaryMapping model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSalaryMapping the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSalaryMapping::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionAjax()
    {   
        //checking wheather the user is already logged in or not
        if (Yii::$app->user->isGuest ) {
                return $this->redirect(['site/login']);
        }
        //getting post data for returning already stored particular values for a user
        if(isset($_POST['test'])){

            $test = $_POST['test'];
            $data = array();
            $index=0;

            $array_particularid_value = ArrayHelper::map(TblSalaryMapping::find()->where(['fk_int_emp_id' => $test])->all(), 'fk_int_particular_id', 'int_value');
            foreach ($array_particularid_value as $key => $value) {
                $data[$index]=array('id' => $key,'value' => $value);  
                $index++;             
            }

            //encoding data into json format
            return \yii\helpers\Json::encode(
                
            [
             $data,
            //     ['test'=>$test,
            //     'id'=>1,
            //     ],
            // ['test'=>$test,
            //     'id'=>4,
            //     ],
            //      $array_particularid_value

            ]
            );
        }
    }




}
