<?php

/**
* Author : Anusree M.M
*Date: 16 June 2017
*Last modified : 18 June 2017
*/


use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TblSalaryMapping;
use yii\widgets\ActiveForm;
use yii\models\TblEmployee;
use yii\models\TblSalaryParticular;

/* @var $this yii\web\View */
/* @var $model app\models\TblEmployee */

//$this->title = $model->pk_int_emp_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-employee-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <div class="col-sm-2">
    </div>
    <!-- To dispaly employee profile -->
    <div class="col-sm-2">
        <?php
            //check wheather the employee picture exixts or not
            if(file_exists($name->vchr_profile_pic))
            {
             echo '<img src='.$name->vchr_profile_pic.' width="150" height="140">';
            }
       ?>
    </div>
    <!-- Detail view containing employee details from tbl_employee -->
    <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        
            'pk_int_emp_id',
            'vchr_name',
            'date_dob',
            'vchr_email:email',
            'vchr_mobile',
            'vchr_address',
        ],
        
    ]) ?>
    </div>
  </div>

<h1>Current Salary</h1>
    <!-- Grid view to display salary details from tbl_salary_mappings -->
    <?= GridView::widget([
     'dataProvider' =>new ActiveDataProvider([
    'query' => TblSalaryMapping::find()->with('fkIntEmp')->where(['fk_int_emp_id'=>$model->pk_int_emp_id]),
    'pagination' => [
        'pagesize' => 5,
     ],
    ]),
     'columns' => [
        'fkIntParticular.vchr_particular_name',
        'int_value',
        ],

    ]); 
    ?> 
    <h1>Update Salary</h1>
    <!-- Active form in the next view -->

     <?= $this->render('create', [
            'model' => $model,
            'modelSalaryMapping' =>$modelSalaryMapping,
            'items'=>$items,
            'name'=>$name,
            'particulars'=>$particulars,
            'id' => $id,
        ]);
        ?>

    
     
          
</div>
