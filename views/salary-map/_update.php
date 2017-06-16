<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblSalaryParticular;
use yii\bootstrap\Alert;
use app\models\TblSalaryMapping;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-salary-mapping-form">

    <?php $form = ActiveForm::begin(['action' =>['salary-map/batch-update'], 'id' => 'forum_post', 'method' => 'post',]); ?>


    <!-- making combo box to display employee name
         return the employee id on selection -->
    <?= $form->field($mapping_of_employee, 'fk_int_emp_id')->label('Employee Name')->widget(Select2::classname(), [
            'data' =>$employee_name,        
            //for displaying all employee names -----> 
            //\yii\helpers\ArrayHelper::map(\app\models\TblEmployee::find()->asArray()->all(), 'pk_int_emp_id', 'vchr_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select Employee...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            ]);
    ?>

    <?php
            /*
            *The inputs are stored inside an array as the number of text fields are dynamically created
            */
            foreach ($array_particularid_value as $key => $value) 
            {
                //check wheather the particular value for the employee is null
                if($value==null)
                    //if it is null then assign the value to zero
                    $value=0;
                echo $form->field($model_clear_object, "[{$key}]int_value")->textInput(['maxlength' => true,'value' => $value])->label($particulars[$key]."(".$particular_type[$key].")");
            }
    ?>





    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
