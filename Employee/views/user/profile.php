<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use app\models\TblEmployee;
use app\models\TblLeave;
?>


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
            [
                'attribute'=>'vchr_profile_pic',
                'value'=>$model->vchr_profile_pic,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'fkIntDesignation.vchr_designation',
            'fkIntDep.vchr_department',
            'date_created',
            
        ],
    ]) ?>