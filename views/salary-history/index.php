<?php
/**
* Author : Anusree M.M
*Date: 16 June 2017
*Last modified : 18 June 2017
*/

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\model\tblSalaryMappings;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Appraisal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-employee-index">
<?php


?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'pk_int_emp_id',
            'vchr_name',
            [
                'label'=>'Total',
                'value'=>function ($model) {
                    //Totalsal() is the global function declared to calculate the salary
                    $total= new \app\components\Totalsal();
                    //findsal() is the function name
                    $salary= $total->findsal($model['pk_int_emp_id']);
                    return $salary;

                           
                
            },   
                
            ],
        [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{Appraisal}',
          'buttons' => [
            'Appraisal' => function ($url, $model) {
                return Html::a('<span class="btn btn-primary btn-xs">Appraisal</span>', $url, [
                            'title' => Yii::t('app', 'Appraisal'),              
                ]);
            },   
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'Appraisal') {
                $url ='index.php?r=salary-history/view&id='.$model['pk_int_emp_id'];
                return $url;
            }
           
        }
        ],
    ],
]);
?>
</div>
