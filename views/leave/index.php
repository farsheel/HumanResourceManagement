<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Leaves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-leave-index">

    
    <h1><?= Html::encode($this->title) ?></h1>
    
    

    
    <p>
        <?= Html::a('Create Tbl Leave', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pk_int_leave_id',
            [
            'attribute'=>'fk_int_emp_id',
            'value'=>'fkIntEmp.vchr_name'
            ],
            
            'date_requested',
            'vchr_title',
            'vchr_description',
            //'fk_status',
            ['attribute'=> 'fk_status',
            'value'=>'fkStatus.vchr_status'  
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
