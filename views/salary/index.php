<?php

/** 
* @author : vishnu
* @date : 10/6/17
* @last modified on :10/6/17
*/



use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblSalaryParticularSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salary Particulars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-salary-particular-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Salary Particular', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <div class="row">
    <?php 
        if($message=='fail')
        {
            echo Alert::widget(['options' => ['class' => 'alert-info',],'body' => 'Sorry Data cannot be deleted <br> This row references some data of salary mapping.',]);
        }
        else if($message=='failbase')
        {
            echo Alert::widget(['options' => ['class' => 'alert-info',],'body' => 'Base salary can only be updated',]);
        }
    ?>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'pk_int_particular_id',
            'vchr_particular_name',
            'vchr_calculation',
             'vchr_type',
            // 'date_created',
            // 'date_modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
