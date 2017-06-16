<?php

/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/



use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryParticular */

$this->title = 'Create Salary Particular';
$this->params['breadcrumbs'][] = ['label' => 'Salary Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-salary-particular-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
