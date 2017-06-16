<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblLeave */

$this->title = 'Update Tbl Leave: ' . $model->pk_int_leave_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Leaves', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pk_int_leave_id, 'url' => ['view', 'id' => $model->pk_int_leave_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-leave-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
