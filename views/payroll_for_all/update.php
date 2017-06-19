<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */

$this->title = 'Update Tbl Payroll: ' . $model->pk_int_payroll_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_int_payroll_id, 'url' => ['view', 'id' => $model->pk_int_payroll_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-payroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
