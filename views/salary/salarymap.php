<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */
/* @var $form ActiveForm */
?>
<div class="salary-salarymap">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fk_int_emp_id') ?>
        <?= $form->field($model, 'fk_int_particular_id')->dropdownList($items,['prompt'=>'Select Category']);?>
        <?= $form->field($model, 'int_value') ?>
        <!-- <?= $form->field($model, 'date_created') ?> -->
        <!-- <?= $form->field($model, 'date_modified') ?> -->
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- salary-salarymap -->
