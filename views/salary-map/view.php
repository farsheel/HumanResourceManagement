<?php

/**
* @author vishnu
* @date 10/6/17
* @date-modified 10/6/17
*/


use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use  yii\web\Session;

    $session = Yii::$app->session;

    if (!$session->isActive)
    {
    $session->open();
    }

/* @var $this yii\web\View */
/* @var $model app\models\TblSalaryMapping */

$this->title = $name->pk_int_emp_id."  ".$name->vchr_name;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Salary Mappings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-salary-mapping-view">

    <!-- <h1><?php // Html::encode($this->title) ?></h1> -->

    <p>
        <!-- <?php // Html::a('Update', ['update', 'id' => $name->pk_int_emp_id], ['class' => 'btn btn-primary']) ?> -->
        
    </p>

<?php 
//converting active query into active data provider
$provider = new ActiveDataProvider([
    'query' => $model,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
 

$totalsal=Yii::$app->Totalsal->findsal($name->pk_int_emp_id);
?>

 <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <?php
            //check wheather the employee picture exixts or not
            if(file_exists($name->vchr_profile_pic))
            {
              echo Html::img($name->vchr_profile_pic, ['width'=>'150','height' => '140']);
            }
            else
            {
              echo '<img src=upload/no-image.png width="150" height="140">';
            }
       ?>
    </div>
    <div class="col-sm-6">
          <?= DetailView::widget([
              'model' => $name,
              'attributes' => [
                  'pk_int_emp_id',
                  'vchr_name',
                  'vchr_email:email',
                  'vchr_mobile',
              ],
          ]) ?>
      </div>
  </div>



 <div class="row">
     <div class="col-sm-1">
     </div>
     <div class="col-sm-10">
              <!-- creating grid view -->
              <?= GridView::widget([
                'dataProvider' => $provider,
                'showFooter'=>TRUE,
                'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
                'columns' => [
                        
                    // ['class' => 'yii\grid\SerialColumn'],
                    // 'pk_int_salary_id',
                        [
                        'label' => 'Particular',
                        'value' => 'fkIntParticular.vchr_particular_name',
                        //setting footer to show total
                        'footer' => 'Total',
                        ],
                        [
                            'attribute' => 'int_value',
                            'value' => function($provider) use ($particular_type,$session)
                                {
                                    if($particular_type[$provider['fk_int_particular_id']]=='Percentage')
                                    {
                                        $Base_sal=$session->get('base_salary');
                                        $percent=$provider['int_value'];
                                        $Base_sal=$Base_sal*$percent;
                                        $Base_sal=$Base_sal/100;
                                        return $Base_sal."(".$provider['int_value']."%)";
                                    }
                                    else
                                    {
                                        if($provider['fk_int_particular_id']==1)
                                        {
                                            $session->set('base_salary', $provider['int_value']);
                                            
                                        }
                                        return $provider['int_value'];
                                    }
                                },
                             'footer' => $totalsal,    
                        ],
                          [
                          //changing default action column to delete and update
                          'class' => 'yii\grid\ActionColumn',
                          //heading of the action column
                          'header' => 'Actions',
                          'headerOptions' => ['style' => 'color:#000000','style' => 'width:20%'],//'color:#337ab7'],
                          'footer' => '',
                          //buttons update,delete,view
                          'template' => '{update}{delete}',
                          'buttons' => [
                                         'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                        'title' => Yii::t('app', 'update'),
                                            ]);
                                         },

                                         'delete' => function ($url, $model) {
                                                $id= $model['pk_int_salary_id'];
                                                $emp_id= $model['fk_int_emp_id'];
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['salary-map/delete'], [
                                                    'class'=>'SalaryMapController',
                                                    'data'=>[
                                                        'method'=>'post',
                                                        'confirm'=>'Are you sure to delete this item?',
                                                        //sends employee id and salary id as post parameters
                                                        'params'=>['id' => $id,'emp_id' => $emp_id],]
                                                    ]);
                                         }

                                      ],
                          'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'update') {
                                $url ='index.php?r=salary-map/update&id='.$model['fk_int_emp_id'];
                                return $url;
                            }
                          }
                          ],
                ],
            ]); ?>

    </div>
  </div>

</div>
