<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblLeave */

$this->title = 'Apply Leave';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Leaves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-leave-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
