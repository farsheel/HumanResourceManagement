<?php
/**
* Author : Anusree M.M
*Date: 25 May 2017
*Last modified : 27 May 2017
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\TblEmployee */
$this->params['breadcrumbs'][] = ['label' => 'Tbl Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-employee-create">

 <?php $form = ActiveForm::begin(['action' =>'index.php?r=salary-history/update&id='.$model['pk_int_emp_id'], 'method' => 'post']); ?>
   <?php
            $amk=0;
            foreach ($items as $key => $value) 
            {
             echo $form->field($modelSalaryMapping, "[{$amk}]int_value")->textInput(['maxlength' => true, 'placeholder' => $value])->label($particulars[$key]);
             $amk++;
            }
    ?>

   <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary'] ) ?>
     </div>

    <?php ActiveForm::end(); ?>
</div>
