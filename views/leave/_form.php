<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\TblLeaveStatus;

/* @var $this yii\web\View */
/* @var $model app\models\TblLeave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-leave-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_int_emp_id')->textInput() ?>

    <?= $form->field($model, 'date_requested')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <?= $form->field($model, 'vchr_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vchr_description')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_status')->dropDownList(
            ArrayHelper::map(TblLeaveStatus::find()->all(), 'pk_int_status_id','vchr_status'),
            ['prompt'=> 'select status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>                     
