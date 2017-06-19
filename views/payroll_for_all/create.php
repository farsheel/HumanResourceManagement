<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */

$this->title = 'Create  Payrolls';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-payroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
