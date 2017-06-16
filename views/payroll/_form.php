<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\widgets\DetailView;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use app\models\TblEmployee;
use app\models\TblPayroll;
use app\models\TblPayrollMonth;
use app\models\TblPayrollYear;
use app\models\TblSalaryParticular;





/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-payroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_int_emp_id')->dropDownList(
            ArrayHelper::map(TblEmployee::find()->all(), 'pk_int_emp_id','vchr_name'),
            ['prompt'=> 'Select...'])
    ?>
    
    <div class="row">
    
        <div class="col-sm-6">
            <?= $form->field($model, 'fk_int_payroll_month')->dropDownList(
                ArrayHelper::map(TblPayrollMonth::find()->all(), 'pk_int_payroll_month_id','vchr_month'),
                // array('Januery'=>'Januery','Februery'=>'Februery','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December'),
            ['prompt'=> 'Select...'])
            ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'fk_int_payroll_year')->dropDownList(
                ArrayHelper::map(TblPayrollYear::find()->all(), 'pk_int_payroll_year_id','year'),
            ['prompt'=> 'Select...'])
            ?>
        </div>
     </div>
     
    
     

     <div class="row">
    
        <div class="col-sm-6">
            <?= $form->field($model, 'vchr_worked_hours')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">    
            <?= $form->field($model, 'vchr_actual_hours')->textInput(['maxlength' => true])?>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
        <div class="form-group">
            <?php //Html::submitButton($model->isNewRecord ? 'Calculate' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        </div>
    </div> -->
    <!--
    <div class="row">
        <php // DetailView::widget([
        'model' => $model,
        'attributes' => [   
            'pk_int_payroll_id',
            'fk_int_emp_id',
            'vchr_worked_hours',
            'vchr_actual_hours',
            'fk_int_payroll_month',
            'fk_int_payroll_year',
        ],
    ]) ?>
    -->
    </div>


    <div class="form-group">
        <?= Html::submitButton('Create & Add New', ['class' => 'btn btn-primary', 'value'=>'create_add', 'name'=>'submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
