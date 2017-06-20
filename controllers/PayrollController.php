<?php

namespace app\controllers;

use Yii;
use app\models\TblPayroll;
use app\models\TblSalaryMapping;
use app\models\TblSalaryParticular;
use app\models\PayrollSearch;
use app\models\TblPayrollDetails;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\ActiveQuery;
use yii\filters\AccessControl;


/**
 * PayrollController implements the CRUD actions for TblPayroll model.
 */
class PayrollController extends Controller
{
  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
      'access' => [
          'class'   => AccessControl::className(),
          'only'    => ['index,create,update,view, display'],
          'rules'   => [
            [
              'allow'   => true,
              'roles'   => ['@'],
              ],
            ],
          ],
      'verbs' => [
          'class'   => VerbFilter::className(),
          'actions' => [
          'delete'  => ['POST'],
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
        Yii::$app->CheckAdmin->authCheck();

        $model          =   new TblPayroll();
        $searchModel    =   new PayrollSearch();
        $dataProvider   =   $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10];
        
        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
            'model'         => $model    
        ]);
    }

    
    /**
     * Displays a single TblPayroll model join With TblEmployee, TblPayrollMonth, TblPayrollYear.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->CheckAdmin->authCheck();

       /**
        *ActiveDataProvider retrive data from tbl_payroll, tbl_employee, tbl_month, tbl_year Using Join.
        * @param integer $id
        * @return mixed
        */
        $query         = new Query; 
        $dataProvider  = new ActiveDataProvider([
                 
                 'query'=> $query
                            ->select(['pk_int_payroll_id','fk_int_emp_id','vchr_name','vchr_actual_hours','vchr_worked_hours','vchr_month', 'year'])
                            ->from('tbl_payroll')
                            ->join( 'INNER JOIN', 'tbl_employee', 'tbl_employee.pk_int_emp_id = tbl_payroll.fk_int_emp_id')
                            ->join('INNER JOIN', 'tbl_payroll_month', 'tbl_payroll_month.pk_int_payroll_month_id = tbl_payroll.fk_int_payroll_month')
                            ->join('INNER JOIN', 'tbl_payroll_year', 'tbl_payroll_year.pk_int_payroll_year_id = tbl_payroll.fk_int_payroll_year')
                            ->where(['pk_int_payroll_id'=> $id])
                            ->One(),
                            ]);
        $model = $dataProvider->query;

         /**
        *ActiveDataProvider retrive data from tbl_payroll_details, tbl_salary_particular Join.
        * @param integer $id
        * @return mixed
        */
        $details             = new Query;
        $dataProviderDetails = new ActiveDataProvider([
                 
                 'query'=> $details
                            ->select(['pk_int_particular_id','vchr_particular_name','int_amount', 'vchr_calculation'])
                            ->from('tbl_payroll_details')
                            ->join( 'INNER JOIN', 'tbl_salary_particular', 'tbl_salary_particular.pk_int_particular_id = tbl_payroll_details.fk_salary_particular_id')
                            ->where(['fk_int_payroll_id'=> $id]),
                            //->All(),
                            ]);
        $payroll = $dataProviderDetails->getModels();
        
        return $this->render('view', [
               'model'   => $model, 
               'payroll' => $payroll,
               'dataProviderDetails' => $dataProviderDetails,             
        ]);
    }   


    /**
     * Creates a new TblPayroll model, TblPayrollDetails.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Yii::$app->CheckAdmin->authCheck();

        $model      =   new TblPayroll();
        $salary     =   new TblSalaryMapping();
        $payroll    =   new TblPayrollDetails();         
                
        
        if($model->load(Yii::  $app->request->post()) && $model->save())              
        { 
          
          $salary->fk_int_particular_id = 0; 
          $salary = TblSalaryMapping::find()->where(['fk_int_emp_id' => $model->fk_int_emp_id])->all(); 
          foreach ($salary as $salary) 
          {
                $payroll  =   new TblPayrollDetails();
                $model    =   TblPayroll::find()->where(['pk_int_payroll_id' => $model->pk_int_payroll_id])->one();
                $payroll->fk_salary_particular_id   =   $salary->fk_int_particular_id;
                $payroll->fk_int_payroll_id         =   $model->pk_int_payroll_id;
                

                if($salary->fk_int_particular_id == 1) 
                {         
                  $modifiedSalary = (($salary->int_value / $model->vchr_actual_hours) * $model->vchr_worked_hours);
                  $payroll->int_amount   =   $modifiedSalary;
                }
                else
                {
                  $payroll->int_amount   =   $salary->int_value;
                }
                $payroll->isNewRecord    = true;
                $payroll->save(); 
            }  
            return $this->redirect(['view', 'id' => $model->pk_int_payroll_id]);
          }
          else 
          {
                return $this->render('create', [
                'model' => $model,
           ]);
          }
    }

    /**
     * Updates an existing TblPayroll model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->CheckAdmin->authCheck();
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

        Yii::$app->CheckAdmin->authCheck();

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

    public function actionDisplay()
    {
        Yii::$app->CheckAdmin->authCheck();
        
        $model      =   new TblPayroll();   
        if(Yii::$app->request->post()!=null) 
        {
            $data   =   Yii::$app->request->post();
            $month  =   $data['TblPayroll']['fk_int_payroll_month'];
            $year   =   $data['TblPayroll']['fk_int_payroll_year'];
            
            $dataProviderSearch = new ActiveDataProvider
            ([
                'query'      => TblPayroll::find()->where(['fk_int_payroll_month'=>$month, 'fk_int_payroll_year'=> $year]),
                'pagination' => ['pageSize' => 5],
            ]);
    
            if($dataProviderSearch)
            {
                $model->fk_int_payroll_month  = $month;
                $model->fk_int_payroll_year = $year;
                return $this->render('index', [
                'dataProviderSearch' => $dataProviderSearch,
                'model' => $model,
                ]);
            }
        }
        else
        {
            return $this->render('index', ['model' => $model]);  
        }   
    }
  }
?>