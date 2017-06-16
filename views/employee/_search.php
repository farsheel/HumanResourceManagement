<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pk_int_emp_id') ?>

    <?= $form->field($model, 'vchr_name') ?>

    <?= $form->field($model, 'vchr_gender') ?>

    <?= $form->field($model, 'date_dob') ?>

    <?= $form->field($model, 'vchr_email') ?>

    <?php // echo $form->field($model, 'vchr_nationality') ?>

    <?php // echo $form->field($model, 'vchr_mobile') ?>

    <?php // echo $form->field($model, 'vchr_address') ?>

    <?php // echo $form->field($model, 'vchr_profile_pic') ?>

    <?php // echo $form->field($model, 'fk_int_designation_id') ?>

    <?php // echo $form->field($model, 'fk_int_dep_id') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
