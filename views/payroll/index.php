<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\TblPayrollMonth;
use app\models\TblPayrollYear;
use app\models\TblPayroll;
use kartik\base\ActionColumn;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblEmployee;





/* @var $this yii\web\View */
/* @var $searchModel app\models\PayrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payrolls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-payroll-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //$this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee Payroll', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <div>
    <?php $form = ActiveForm::begin([
                     
                    'method' => 'POST',
                    'action' =>  (['payroll/display']), 
                    'enableClientScript' => true,
        ]); ?>

    <div class="row">
        <div class="col-sm-12" align="center">
            <?= $form->field($model, 'fk_int_payroll_month')->dropDownList(
                ArrayHelper::map(TblPayrollMonth::find()->all(), 'pk_int_payroll_month_id','vchr_month'),
            ['prompt'=> 'Select...'])
            ?> 
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm-12" align="center">
            <?= $form->field($model, 'fk_int_payroll_year')->dropDownList(
                ArrayHelper::map(TblPayrollYear::find()->all(), 'pk_int_payroll_year_id','year'),
            ['prompt'=> 'Seect...'])
            ?>
        </div>
        
    </div>
    <div class="form-group">
         
         <?= Html::submitButton('Show', ['class' => 'btn btn-success', 'name'=>'submit']) ?>

    </div>
    <?php ActiveForm::end(); ?>
    </div>
     
    <div>
    <?php 
        if(isset($dataProviderSearch))
        {

            Pjax::begin();      
            echo GridView::widget(
                [
                'dataProvider' => $dataProviderSearch,
                'columns' => 
                [
                    ['class' => 'yii\grid\SerialColumn'],
                    'pk_int_payroll_id',
                    [
                        'attribute' =>  'fk_int_emp_id',
                        'value'     =>  'fkIntEmp.vchr_name'
                        // 'filter' => Html::activeDropDownList($searchModel, 'fk_int_emp_id', ArrayHelper::map(TblPayroll::find()->asArray()->all(), 'fk_int_emp_id', 'fk_int_emp_id'),['class'=>'kartik\grid\ActionColumn','prompt' => 'Select name'])
                    ],           
                    [   
                        'attribute' =>   'fk_int_payroll_month',
                        'value'     =>   'fkIntPayrollMonth.vchr_month'
                    ],
                    [   
                        'attribute' =>   'fk_int_payroll_year',
                        'value'     =>   'fkIntPayrollYear.year'
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
                ]); 
            Pjax::end(); 
        } 
    ?> 
    </div>
<!-- <?php //Pjax::begin(); ?>    <?php //GridView::widget([
        //'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        //'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

  //          'pk_int_payroll_id',
//            [
    //            'attribute' =>  'fk_int_emp_id',
      //          'value'     =>  'fkIntEmp.vchr_name',
        //        'filter' => Html::activeDropDownList($searchModel, 'fk_int_emp_id', ArrayHelper::map(TblPayroll::find()->asArray()->all(), 'fk_int_emp_id', 'fk_int_emp_id'),['class'=>'kartik\grid\ActionColumn','prompt' => 'Select name'])
          //  ],           
          //  'vchr_worked_hours',
          //  'vchr_actual_hours',
           // [   
            //    'attribute' =>   'fk_int_payroll_month',
            //    'value'     =>   'fkIntPayrollMonth.vchr_month',
            //    'filter' => Html::activeDropDownList($searchModel, 'fk_int_payroll_month', ArrayHelper::map(TblPayroll::find()->asArray()->all(), 'fk_int_payroll_month', 'fk_int_payroll_month'),['class'=>'kartik\grid\ActionColumn','prompt' => 'Select Month'])   
        //    ],
         //   [   
          //      'attribute' =>   'fk_int_payroll_year',
           //     'value'     =>   'fkIntPayrollYear.year',
            //    'filter' => Html::activeDropDownList($searchModel, 'fk_int_payroll_year', ArrayHelper::map(TblPayroll::find()->asArray()->all(), 'fk_int_payroll_year', 'fk_int_payroll_year'),['class'=>'kartik\grid\ActionColumn','prompt' => 'Select year'])   
           // ],
            
            

            //['class' => 'yii\grid\ActionColumn'],
     //   ],
    //]); ?>
<?php //Pjax::end(); ?> </div>
 -->