<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TblLeaveStatus;
use app\models\TblLeave;
use app\models\TblEmployee;

?>
<h1>Leave Status</h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'date_requested',
            'vchr_title',
            'vchr_description',
            'fkStatus.vchr_status',
        ],
    ]) ?>