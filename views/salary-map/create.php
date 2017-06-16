<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/



use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */

$this->title = 'Create Salary Mapping';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Salary Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-salary-mapping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
        'employee_name' => $employee_name,
        'particular_type' => $particular_type,
    ]) ?>

</div>
