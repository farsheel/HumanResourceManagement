<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblPayrollMonth;


/* @var $this yii\web\View */
/* @var $model app\models\PayrollSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-payroll-search">

     <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <?= $form->field($model, 'pk_int_payroll_id')->dropDownList(
            ArrayHelper::map(TblPayrollMonth::find()->all(), 'pk_int_payroll_month_id','vchr_month'),
            ['prompt'=> 'Select...'])?> 

    <?= $form->field($model, 'fk_int_emp_id') ?>


    <?=  $form->field($model, 'vchr_worked_hours') ?>

    <?= $form->field($model, 'vchr_actual_hours') ?>

    <?php  echo $form->field($model, 'fk_int_payroll_month') ?>

    <?php  echo $form->field($model, 'fk_int_payroll_year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
 