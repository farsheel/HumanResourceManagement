<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TblEmployee;
use app\models\TblLeave;
?>
<h1>Leave History</h1>
<?php 
$email=Yii::$app->user->identity->vchr_email;
$emp_id=TblEmployee::find()->where(['vchr_email'=>$email])->one();
?>

<?= GridView::widget([
    'dataProvider' =>new ActiveDataProvider([
    'query' => TblLeave::find()->where(['fk_int_emp_id'=>$emp_id->pk_int_emp_id]),
    'pagination' => [
        'pagesize' => 5,
    ],
]),
     'columns' => [
        'date_requested',
        'vchr_title',
        'vchr_description',
        'fkStatus.vchr_status'
        ],
    ]); ?>