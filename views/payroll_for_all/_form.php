<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblPayrollYear;
use app\models\TblPayrollMonth;
use app\models\TblEmployee;
use yii\db\Query;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TblPayroll;

/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */
/* @var $form yii\widgets\ActiveForm */
?> <?php
  // $session = new Session;
   //$session->open();

       $model = new TblPayroll();
      ?>  
<div class="tbl-payroll-form">

    <?php $form = ActiveForm::begin([
   'action'=>['payroll_for_all/savepay'],
    'method'=>'post']); ?>
     <div class="row">
    
        <div class="col-sm-4">
       <?php if(isset($year))
        {
           echo $form->field($model,'fk_int_payroll_year')->textInput(['value'=>$year]); 
        }
        else{


         echo $form->field($model,'fk_int_payroll_year')->dropDownList(
                ArrayHelper::map(TblPayrollYear::find()->all(), 'pk_int_payroll_year_id','year'),
            ['prompt'=> 'Select...']);}
            ?>
             <?php
              if(isset($month))
        {
           echo $form->field($model,'fk_int_payroll_month')->textInput(['value'=>$month]); 
        }
        else{


             echo $form->field($model,'fk_int_payroll_month')->dropDownList(
                ArrayHelper::map(TblPayrollMonth::find()->all(), 'pk_int_payroll_month_id','vchr_month'),
            ['prompt'=> 'Select...']);}
            ?>
        

   

    </div></div>
    
     <?= Html::submitButton('show', ['class' => 'btn btn-default']) ?>
      </div>
<?php
    
if(isset($provider))

{
      ?> <div class="row">
    
        <div class="col-sm-4">
    <?php
       echo $form->field($model, 'vchr_actual_hours')->textInput(); ?>
       </div></div>
       <?php

                    
       echo GridView::widget([
        'dataProvider' => $provider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            'pk_int_emp_id',
             'vchr_name',
            [
            'label'=>'worked hours',
            'value' =>

function($model,$i){ 
    return Html::textInput($i,'');
     },

'format' => 'raw',
],

        ]  ,      
            
            

           // ['class' => 'yii\grid\ActionColumn'],
         ]
    );
//$workedhours=$.fn.yiiGridView.getColumn("CGridViewUser",1).text();
//ar_dump($workedhours);
//die;
  
/*$session = Yii::$app->session;


$session['provider'] = $provider;

var_dump($provider);
die;*/


  /*  
*/
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php }ActiveForm::end(); ?>


  