<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMappingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-salary-mapping-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pk_int_salary_id') ?>

    <?= $form->field($model, 'fk_int_emp_id') ?>

    <?= $form->field($model, 'fk_int_particular_id') ?>

    <?= $form->field($model, 'int_value') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
