<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMappingHistory */


?>

    <h1>you are done!!!!!!!!!!</h1>
 <?php 
 $form = ActiveForm::begin([
     'action' => 'index.php?r=tblsalarymappinghistory/view&id='.$id]);?> 

<div class="form-group">
        <?= Html::submitButton('GO BACK',['class' => 'btn btn-primary' ]) ?>
    </div>
<?php ActiveForm::end();
    


