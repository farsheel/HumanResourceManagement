<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblDepartment */

$this->title = 'Update Tbl Department: ' . $model->pk_int_dep_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_int_dep_id, 'url' => ['view', 'id' => $model->pk_int_dep_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
