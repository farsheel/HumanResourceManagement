<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblLeave */
/* @var $form ActiveForm */
?>
<div class="user-leaveform">

    <?php $form = ActiveForm::begin(); ?>

        <!--<?= $form->field($model, 'fk_int_emp_id') ?>-->
        <?= $form->field($model, 'date_requested') ?>
        <?= $form->field($model, 'vchr_title') ?>
        <?= $form->field($model, 'vchr_description')->textarea(['rows' => 6]) ?>
       <!-- <?= $form->field($model, 'fk_status') ?> -->
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-leaveform -->
