<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vchr_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_dob')->textInput() ?>

    <?= $form->field($model, 'vchr_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_profile_pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_int_designation_id')->textInput() ?>

    <?= $form->field($model, 'fk_int_dep_id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'fk_int_user_type')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'vchr_password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
