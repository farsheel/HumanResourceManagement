<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TblExperience;
use app\models\TblQualification;
use app\models\TblEmployee;
use app\models\TblEmployeeDocuments;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->vchr_name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p align="center">
    <img src=<?= "'".$model->vchr_profile_pic."'"?> class="img-circle" alt="User Pic" width="100" height="100"> 
    </p>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pk_int_emp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pk_int_emp_id], [
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
            'pk_int_emp_id',
            'vchr_name',
            'vchr_gender',
            'date_dob',
            'vchr_email:email',
            'vchr_nationality',
            'vchr_mobile',
            'vchr_address',
            'fkIntDesignation.vchr_designation',
            'fkIntDep.vchr_department',
            'date_created',
            
        ],
    ]) ?>
    <h2>Experiences</h2>
    <?= GridView::widget([
     'dataProvider' =>new ActiveDataProvider([
    'query' => TblExperience::find()->with('fkIntEmp')->where(['fk_int_emp_id'=>$model->pk_int_emp_id]),
    'pagination' => [
        'pagesize' => 5,
    ],
]),
     'columns' => [
        'vchr_designation',
        'vchr_period',
        'vchr_company',
        ],
    ]); ?>

    <h2>Qualifications</h2>
    <?= GridView::widget([
     'dataProvider' =>new ActiveDataProvider([
    'query' => TblQualification::find()->with('fkIntEmp')->where(['fk_int_emp_id'=>$model->pk_int_emp_id]),
    'pagination' => [
        'pagesize' => 5,
    ],
]),
     'columns' => [
        'vchr_qualification',
        'vchr_institute',
        'vchr_passout_year',
        'float_percentage',
        ],
    ]); ?>


    <h2>Documents</h2>
    <?= GridView::widget([
     'dataProvider' =>new ActiveDataProvider([
    'query' => TblEmployeeDocuments::find()->with('fkIntEmp')->where(['fk_int_emp_id'=>$model->pk_int_emp_id]),
    'pagination' => [
        'pagesize' => 5,
    ],
]),
     'columns' => [
        'vchr_document_title',
        'vchr_document_description',
        [
            'attribute' => 'vchr_document',
            'format' => 'raw',
            'value' => function($model){
                    return Html::a('View',$model->vchr_document);}
        ],
        
        ],
    ]); ?>





</div>
