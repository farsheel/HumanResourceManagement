<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

use yii\data\ActiveDataProvider;
use app\models\TblSalaryMapping;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMappingHistory */
$this->title = 'SALARY APPRAISAL';
$this->params['breadcrumbs'][] = ['label' => 'MENU', 'url' => ['viewdata']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-salary-mapping-history-view">
<h1 align="center">SALARY APPRAISAL</h1>
 <?=  DetailView::widget([
        'model' =>$model1,
        'attributes' => [
        'pk_int_emp_id',
        'vchr_name'
          ,'vchr_gender',
'date_dob',
'vchr_email',
'vchr_mobile']
    ]);
?>

<br><h2>Current Salary</h2>


  <?= 


GridView::widget([
   'dataProvider' =>$dataProvider,
    'columns' => [
    'fkIntParticular.vchr_particular_name',
    'int_value']
    
    ]);


    ?>
    
<br><h2>NEW Salary</h2>
<div align="center">
  <div class="row" >
    <?php

     $form = ActiveForm::begin([
     'action' => 'index.php?r=tblsalarymappinghistory/create&id='.$model1->pk_int_emp_id]);?> 
      <div class="col-md-2"> 
       <?= Html::activeDropDownList($model3, 'vchr_particular_name',$model2); ?>
      </div>
    </div>
  <div class="row"> 
    <div class="col-md-2"> 
      <?= $form->field($model, 'int_value')->textInput() ?>
    </div>
  </div>
 </div>
 <div class="row"> 
  <div class="col-md-1"> 
   <div class="form-group">
      <?= Html::submitButton('Save',['class' => 'btn btn-primary' ]) ?>
   </div>
  </div>
  <?php ActiveForm::end();?>
 
  
</div>


