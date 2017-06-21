<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\TblEmployee;
use yii\db\Query;
/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */

$this->title = "Payroll Details";
$this->params['breadcrumbs'][] = ['label' => 'Tbl Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <?php /*displays payroll details of every employee*/?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
             [
                'label' => 'Year',
                'value' => $model->fk_int_payroll_year,
            ],

             [
                'label' => 'Month',
                'value' => $model->fk_int_payroll_month,
            ],
            'vchr_actual_hours',
            
           
           
        ],
    ]) ;
    echo GridView::widget([
        'dataProvider' => $provider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pk_int_payroll_id',
            'vchr_name',
            
            'vchr_worked_hours',
            'int_amount',
            'vchr_particular_name',
                        
           ]  ,      
            
            

               ]
    );
        


?>


</div>
