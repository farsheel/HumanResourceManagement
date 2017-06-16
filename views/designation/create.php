<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblDesignation */

$this->title = 'Add Designation';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-designation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
