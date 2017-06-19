<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\payrolsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-payroll-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pk_int_payroll_id') ?>

    <?= $form->field($model, 'fk_int_emp_id') ?>

    <?= $form->field($model, 'vchr_worked_hours') ?>

    <?= $form->field($model, 'vchr_actual_hours') ?>

    <?= $form->field($model, 'fk_int_payroll_month') ?>

    <?php // echo $form->field($model, 'fk_int_payroll_year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
