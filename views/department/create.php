<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblDepartment */

$this->title = 'Add Department';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
