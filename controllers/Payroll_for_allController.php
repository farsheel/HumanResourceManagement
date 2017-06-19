<?php

namespace app\controllers;

use Yii;
use app\models\TblPayroll;
use app\models\payrolsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use app\models\TblEmployee;

use yii\data\ActiveDataProvider;
use app\models\TblPayrollDetails;
use app\models\TblSalaryMapping;

/**
 * PayrolController implements the CRUD actions for TblPayroll model.
 */
class Payroll_for_allController extends Controller
{
    /**
     * @inheritdoc


      public $year ='hhg';
        public $month=null;
        public $users= null;*/
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
     * Lists all TblPayroll models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model      =   new TblPayroll();
        $searchModel = new payrolsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'         =>$model,
        ]);
    }

    /**
     * Displays a single TblPayroll model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new TblPayroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        if (Yii::$app->user->isGuest ) {
            return $this->redirect(['/site/login']);

    }
    $model =new TblPayroll;
       return $this->render('create', [
                'model' => $model,
           ]);

    }
    public function actionSavepay()
    {
        $model =new TblPayroll;
        if(Yii::$app->request->post())
        {
            $model->load(Yii::$app->request->post());
            if(($model->vchr_actual_hours==null))
           {
                
                $data=Yii::$app->request->post();
                $year=$data['TblPayroll']['fk_int_payroll_year'];
                $month=$data['TblPayroll']['fk_int_payroll_month'];
          
                $qry = new Query;
                $employee = new TblEmployee;
                $qry->select('pk_int_emp_id,vchr_name')
                     ->from('tbl_employee');
                $rows = $qry->all();
                
                $provider = new ActiveDataProvider([
                             'query' =>$qry ,
                             'pagination' => [
                                 'pageSize' => 10,
                                                 ],
                                ]); 
                $users = $provider->getModels();
                $n = count($users);

                return  $this->render('_form', array('provider' => $provider, 'year'=>$year,'month'=>$month)); 
            }
        else
        {
            
            $payrol=new TblPayroll;
             if(Yii::$app->request->post())
            {
                $data=Yii::$app->request->post();
                 
                 $employee=TblEmployee::find()->all();
                 $i=0;
                 $year=$model->fk_int_payroll_year;
                 $month=$model->fk_int_payroll_month;
                 foreach ($employee as $employee) {
                 $payrol = new TblPayroll;
                 $payrol->fk_int_emp_id = $employee->pk_int_emp_id;
                 $payrol->vchr_worked_hours  =$data[$i];
                 
                 $payrol->vchr_actual_hours = $model->vchr_actual_hours;
                 $payrol->fk_int_payroll_month =$model->fk_int_payroll_month;
                 $payrol->fk_int_payroll_year = $model->fk_int_payroll_year;
                $payrol->isNewRecord = true;
                $payrol->save(); 
                $id=$payrol->pk_int_payroll_id;
                
                 if($payrol->save()) 
                 {   
                $salary = TblSalaryMapping::find()->where(['fk_int_emp_id' => $payrol->fk_int_emp_id])->all(); 
                foreach ($salary as $salary) 
                { 
                    
                    //$salaryParticular = TblSalaryParticular::find()->all();

                    $payrolldetail = new TblPayrollDetails();
                    $payrolldetail->fk_salary_particular_id = $salary->fk_int_particular_id;
                    $payrolldetail->fk_int_payroll_id = $payrol->pk_int_payroll_id;
                    if($salary->fk_int_particular_id==1) 



                    {   

                      $sal = (($salary->int_value / $model->vchr_actual_hours)*$data[$i]);
                         $modifiedSalary=round($sal);
                        
                           
                           $payrolldetail->int_amount = $modifiedSalary;
                   
                  }
                    else
                    {
                    $payrolldetail->int_amount = $salary->int_value;
                    }
                    $payrolldetail->isNewRecord = true;
                    $payrolldetail->save(); 

 
                    }   

            }}
        
       
        }}/*to display details in view..*/

      


$query = new Query;
// compose the query
$query->select (' pk_int_payroll_id,fk_int_emp_id,tbl_employee.vchr_name,tbl_payroll_year.year,tbl_payroll.vchr_actual_hours,tbl_payroll.vchr_worked_hours,tbl_payroll_month.vchr_month,tbl_payroll_details.int_amount,tbl_salary_particular.vchr_particular_name')

    ->from('tbl_payroll')
    ->innerJoin('tbl_employee','tbl_payroll.fk_int_emp_id=tbl_employee.pk_int_emp_id')
    ->innerJoin('tbl_payroll_month','tbl_payroll.fk_int_payroll_month=tbl_payroll_month.pk_int_payroll_month_id')
    ->innerJoin('tbl_payroll_year','tbl_payroll.fk_int_payroll_year=tbl_payroll_year.pk_int_payroll_year_id')
    ->innerJoin('tbl_payroll_details','tbl_payroll.pk_int_payroll_id=tbl_payroll_details.fk_int_payroll_id')
    ->innerJoin('tbl_salary_particular','tbl_payroll_details.fk_salary_particular_id=tbl_salary_particular.pk_int_particular_id')
    
    //->groupBy('pk_int_payroll_id')
    ->where('fk_int_payroll_year=:year&&fk_int_payroll_month=:month',array(':year'=>$year,':month'=>$month));
    
// build and execute the query
$rows = $query->all();

   
 $provider = new ActiveDataProvider([
    'query' => $query,
   'pagination' => [
       'pageSize' => 10,
    ],
    ]);
 $i++;
     $emp =TblEmployee::find()->all();

     return $this->render('view',array('provider' => $provider,'model'=>$model,'emp'=>$emp));
     //return $this->render('index',array('model'=>$model));



 }}



 public function actionDisplay()
    {
        $model      =   new TblPayroll();
       
        // $model = new PayrollSearch;

    
        if(Yii::$app->request->post()!=null) 
        {
            $data = Yii::$app->request->post();
            $month = $data['TblPayroll']['fk_int_payroll_month'];
            $year = $data['TblPayroll']['fk_int_payroll_year'];

            /* Be careful with this! */

             $query = new Query;
// compose the query
$query->select (' pk_int_payroll_id,fk_int_emp_id,fk_int_payroll_year,tbl_employee.vchr_name,fk_int_payroll_month,vchr_actual_hours,vchr_worked_hours,tbl_payroll_details.int_amount,tbl_payroll_details.fk_salary_particular_id,tbl_salary_particular.vchr_particular_name')

         ->from('tbl_payroll')
         ->innerJoin('tbl_employee','tbl_payroll.fk_int_emp_id=tbl_employee.pk_int_emp_id')
    ->innerJoin('tbl_payroll_month','tbl_payroll.fk_int_payroll_month=tbl_payroll_month.pk_int_payroll_month_id')
    ->innerJoin('tbl_payroll_year','tbl_payroll.fk_int_payroll_year=tbl_payroll_year.pk_int_payroll_year_id')
    
          ->innerJoin('tbl_payroll_details','tbl_payroll.pk_int_payroll_id=tbl_payroll_details.fk_int_payroll_id')
           ->innerJoin('tbl_salary_particular','tbl_payroll_details.fk_salary_particular_id=tbl_salary_particular.pk_int_particular_id')
   
             ->where('fk_int_payroll_year=:year&&fk_int_payroll_month=:month',array(':year'=>$year,':month'=>$month));
            $rows = $query->all();
         
            $providersearch = new ActiveDataProvider
            ([
                'query' => $query,//TblPayroll::find()->where(['fk_int_payroll_month'=>$month, 'fk_int_payroll_year'=> $year]),
               // 'pagination' => ['pageSize' => 5],
            ]);
           

            if($providersearch)
            {
                return $this->render('index', [
                'providersearch' => $providersearch,
                'model' => $model,
                ]);
            }
        }
            else{
                 return $this->render('index', ['model' => $model]);
    
             }}
     /**
     * Updates an existing TblPayroll model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pk_int_payroll_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblPayroll model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPayroll model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPayroll the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPayroll::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
