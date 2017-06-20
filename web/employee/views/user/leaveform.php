<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TblLeave */
/* @var $form ActiveForm */
?>
<div class="user-leaveform">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date_requested')->widget(DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

      
        
        <?= $form->field($model, 'vchr_title') ?>
        <?= $form->field($model, 'vchr_description')->textarea(['rows' => 6]) ?>
       
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-leaveform -->
