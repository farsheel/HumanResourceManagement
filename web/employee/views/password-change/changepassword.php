<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
?>
<div class="tbl-employee-change-password">

 <?php
 $status=Yii::$app->request->get();
 //$status=null;
 if (isset($_GET['status'])) {
$status=$status['status'];
 
 if($status=='fail')
 {
 	echo Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => 'enter valid data',
]);

 }else if($status=='ok')
 {
echo Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => 'Your Password is Changed',
]);
 }
 }
  $form = ActiveForm::begin(['action' =>'index.php?r=password-change/changepassword&id='.$id , 'method' => 'post']); ?>
   <?php
          	
          	 echo $form->field($model, 'old_password')->passwordInput(['maxlength' => true, 'placeholder' => 'Enter your Old Password'])->label("Password");
              echo $form->field($model, 'new_password')->passwordInput(['maxlength' => true, 'placeholder' => 'Enter your New Password'])->label("New Password");
              echo $form->field($model, 'repeat_password')->passwordInput(['maxlength' => true, 'placeholder' => 'Repeat New Password'])->label("ReEnter Password");
             //echo $form->field($model, 'vchr_password')->textInput(['maxlength' => true, 'placeholder' => 'Enter your New Password'])->label("New Password");


        
    ?>

   <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary'] ) ?>
     </div>
     <?php ActiveForm::end(); ?>
     </div>