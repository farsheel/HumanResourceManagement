<?php


/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/



use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryParticular */

//setting title to the particular name
$this->title = $model->vchr_particular_name;
$this->params['breadcrumbs'][] = ['label' => 'Salary Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-salary-particular-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pk_int_particular_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pk_int_particular_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pk_int_particular_id',
            'vchr_particular_name',
            'vchr_calculation',
            'vchr_type',
            //'date_created',
            //'date_modified',
        ],
    ]) ?>

</div>
