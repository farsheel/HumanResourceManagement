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
            ]); 
        ?>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center">
                <?= $form->field($model, 'fk_int_payroll_month')->dropDownList(
                    ArrayHelper::map(TblPayrollMonth::find()->all(), 'pk_int_payroll_month_id','vchr_month'),
                    ['prompt'=> 'Select...'])
                ?> 
            </div>
            <div class="col-sm-4"></div> 
        </div>
        
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center" >
                <?= $form->field($model, 'fk_int_payroll_year')->dropDownList(
                    ArrayHelper::map(TblPayrollYear::find()->all(), 'pk_int_payroll_year_id','year'),
                    ['prompt'=> 'Seect...'])
                ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" align="center">
            <?= Html::submitButton('Show', ['class' => 'btn btn-success', 'name'=>'submit']) ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
     
    <div class="row">
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
</div>
