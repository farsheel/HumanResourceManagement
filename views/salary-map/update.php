<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/



use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */
// var_dump($employee_name);
// return;

foreach ($employee_name as $key => $value) {
$this->title = 'Update Salary Mapping: '.$key." " . $value;
}
$this->params['breadcrumbs'][] = ['label' => 'Tbl Salary Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $id, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-salary-mapping-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'array_particularid_value' => $array_particularid_value,
        'employee_name' => $employee_name,
        'mapping_of_employee' => $mapping_of_employee,
        'particulars' => $particulars,
        'id' => $id,
        'model_clear_object' => $model_clear_object,
        'particular_type' => $particular_type,
    ]) ?>

</div>
