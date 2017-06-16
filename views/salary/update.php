<?php

/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/



use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryParticular */

$this->title = 'Update Salary Particular: ' . $model->pk_int_particular_id;
$this->params['breadcrumbs'][] = ['label' => 'Salary Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_int_particular_id, 'url' => ['view', 'id' => $model->pk_int_particular_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-salary-particular-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
