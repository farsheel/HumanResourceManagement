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

    <div class="form-group">
        <?= Html::submitButton('Create & Add New', ['class' => 'btn btn-primary', 'value'=>'create_add', 'name'=>'submit']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
