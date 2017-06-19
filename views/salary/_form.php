<?php

/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryParticular */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    $('#contact-form').on('beforeSubmit', function (e) {
    if (!confirm("Everything is correct. Submit?")) {
        return false;
    }
    return true;
});
</script>
<div class="row">
<div class="col-sm-3">
<div class="tbl-salary-particular-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vchr_particular_name')->textInput(['maxlength' => true,]);//'style'=>'width:400px']) ?>

    <?php
    //creating drop down field to select calculation type
    echo $form->field($model, 'vchr_calculation')->dropDownList(['Addition' => 'Addition', 'Subtraction' => 'Subtraction'],
       // ['style'=>'width:400px'],
        ['prompt'=>'Select Option','id' => 'hi6']);
    ?>

    <?php
    //creating drop down field to select type of salary particular
    echo $form->field($model, 'vchr_type')->dropDownList(['Amount' => 'Amount', 'Percentage' => 'Percentage'],
        //['style'=>'width:400px'],
        ['prompt'=>'Select Option']);
    ?>


  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
<div class="col-sm-6">
    
</div>
</div>
