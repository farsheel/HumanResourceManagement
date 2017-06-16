<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblDesignation */

$this->title = 'Update Tbl Designation: ' . $model->pk_int_designation_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_int_designation_id, 'url' => ['view', 'id' => $model->pk_int_designation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-designation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
