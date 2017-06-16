<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use app\models\TblSalaryMapping;
use app\models\TblPayrollDetails;
use app\models\TblSalaryParticular;
use app\models\TblPayroll;
use yii\db\Query;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $model app\models\TblPayroll */



$this->title = $model['vchr_name'];
$this->params['breadcrumbs'][] = ['label' => 'Tbl Payrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-payroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['pk_int_payroll_id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['pk_int_payroll_id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    

    <!-- This find the total salary and passed to DetailView -->
    <?php 
        $salary = TblSalaryMapping::find()->where(['fk_int_particular_id'=>1, 'fk_int_emp_id'=> $model['fk_int_emp_id']])->One();
        $basic = $salary->int_value;
        
        $paySalary = 0;
        $count = count($payroll);
      
       
        for ($i=0; $i < $count; $i++) { 
            
            if($payroll[$i]['vchr_calculation']=="addition")
            {
                
                $paySalary = $paySalary + $payroll[$i]['int_amount'];
            }
            if ($payroll[$i]['vchr_calculation']=="deduction") 
            {
                $paySalary = $paySalary - $payroll[$i]['int_amount'];   
            }
        }



        
     ?>
    
    <!-- This displays Personnel Information From Tblpayroll model -->
    <h3>Personnel Information</h3>
    <?= DetailView::widget([
        'model' => $model,
        //'payroll' => $payroll
        'attributes' => [
            [
                'label' => 'Employee ID',
                'value' => $model['pk_int_payroll_id'],
            ],
            [
                'label' => 'Employee',
                'value' => $model['vchr_name'],
            ],
            // [
            //     'label' => 'Basic Salary',
            //     'value' => $model->fkIntSalary->int_value,
            // ],
            
            // 'vchr_worked_hours',
            // 'vchr_actual_hours',
            [
                'label' => 'Month',
                'value' => $model['vchr_month'],
            ],
            [
                'label' => 'Year',
                'value' => $model['year'],
            ],
            [
                'label' => 'Actual Salary',
                'value' => $basic,
            ],
            [
                'label' => 'Actual hours',
                'value' => $model['vchr_actual_hours'],
            ],
            [
                'label' => 'Worked hours',  
                'value' => $model['vchr_worked_hours'],
            ],
            
        ],
    ]) ?>



    <!-- This displays Salary Information From Tblpayroll model -->
    
    <h3>Salary Information</h3>
    <!-- <?// DetailView::widget([
    //     'model' => $model,
    //     //'payroll' => $payroll,
    //     'attributes' => [
            
            
    //         [
                
    //             'label' =>$payroll[0]['vchr_particular_name'],
    //             'value' => $payroll[0]['int_amount'],
                
    //         ],
    //         [
    //             'label' =>$payroll[1]['vchr_particular_name'],
    //             'value' => $payroll[1]['int_amount'],
    //         ],
    //         [
    //             'label' =>$payroll[2]['vchr_particular_name'],
    //             'value' => $payroll[2]['int_amount'],
    //         ],
    //         [
    //             'label' =>$payroll[3]['vchr_particular_name'],
    //             'value' => $payroll[3]['int_amount'],
    //         ],
    //         [
    //             'label' =>'Total',
    //             'value' => $paySalary,
    //         ],


            
    //     ],
    //]) ?>-->




    <?php echo GridView::widget([
        'dataProvider' => $dataProviderDetails,
        'showFooter' => TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
        'columns' => 
                [
                    ['class' => 'yii\grid\SerialColumn'],
                    [   
                        'attribute' =>   'Salary Particulars',
                        'value'     =>   'vchr_particular_name',
                        'footer'    =>    'Total',
                    ],
                    [   
                        'attribute' =>   'Amount',
                        'value'     =>   'int_amount',
                        'footer'=>$paySalary,
                    ],
                ],
        
        ]); 
    ?> 
    
         <!-- <?php //GridView::widget([
    // 'dataProvider' => new ActiveDataProvider([
    //     'details' => $details,
    //     'pagination' =>['pageSize'=> 10] 

    //     ]),
    

    // 'columns' => [
    //     'vchr_particular_name',
        // ...
   // ],
    //]) ?> -->
    
        

</div>
