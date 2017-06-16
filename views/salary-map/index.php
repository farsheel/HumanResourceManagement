<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/



use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TblSalaryParticular;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TblSalaryMappingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salary Mappings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-salary-mapping-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Salary Mapping', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div>
	<?php 
		if($message=='fail')
		{
			echo Alert::widget(['options' => ['class' => 'alert-info',],'body' => 'You must have at leat one salary particular to do update',]);
        }
	?>
</div>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
            'label' => 'Employee ID',
            'value' => 'pk_int_emp_id',
        ],
        [
            'label' => 'Employee Name',
            'value' => 'vchr_name',
        ],
        // [
        //     'label' => 'Salary',
        //     'value' => 'sume',
        // ],
        [
            'label' => 'Salary',
            'value' =>  function ($dataProvider) {
                            if(Yii::$app->Totalsal->check($dataProvider['pk_int_emp_id'])==0)
                            {
                                return "Not created";
                            }
                            else
                            {
                            return Yii::$app->Totalsal->findsal($dataProvider['pk_int_emp_id']);
                            }
                        },
        ],
            
        //     [
        //     'label' => 'Name',
        //     'value' => 'fkIntEmp.vchr_name',
        // ],
        //     [
        //     'label' => 'Particular',
        //     'value' => 'fkIntParticular.vchr_particular_name',
        // ],
            //'fk_int_particular_id',
            // 'int_value',
        
       //['class' => 'yii\grid\ActionColumn'],//, 'template' => '{view} {update} {delete} '],
            //'date_created',
            // 'date_modified',



/**
*this code snipet is to change url of the action column of the grid view.
*/
            [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          // 'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}',//{delete}
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'update'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'delete'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='index.php?r=salary-map/view&id='.$model['pk_int_emp_id'];
                return $url;
            }

            if ($action === 'update') {
                $url ='index.php?r=salary-map/update&id='.$model['pk_int_emp_id'];//.$dataProvider->pk_int_emp_id;
                return $url;
            }
            if ($action === 'delete') {
                $url ='index.php?r=salary-map/delete&id='.$model['pk_int_emp_id'];//.$dataProvider->pk_int_emp_id;
                return $url;
            }

          }
          ],

           
        ],
    ]); ?>
</div>
