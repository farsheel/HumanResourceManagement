<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use app\models\TblEmployee;
use app\models\TblSalaryMapping;
use app\models\TblSalaryMappingHistory;


//$this->title = $model->date_created;
$this->title = 'MENU';

$this->params['breadcrumbs'][] = $this->title;

?>
<div>


  <?=

      GridView::widget([
        'dataProvider' => $dataProvider1,
    'columns' =>[
    'pk_int_emp_id','vchr_name',

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
                $url ='index.php?r=tblsalarymappinghistory/view&id='.$model['pk_int_emp_id'];
                return $url;
            }
           
        }
      ],[
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{History}',
          'buttons' => [
            'History' => function ($url, $model) {
                return Html::a('<span class="btn btn-primary btn-xs">History</span>', $url, [
                            'title' => Yii::t('app', 'History'),
                            
                ]);
            },
            
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'History') {
                $url ='index.php?r=tblsalarymappinghistory&id='.$model['pk_int_emp_id'];
                return $url;
            }
           
        }
      ]

      ]
    ]);
 ?>



 

</div>