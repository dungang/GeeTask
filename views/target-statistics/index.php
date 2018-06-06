<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TargetStatisticsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '指标统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-statistics-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'target_id',
            'dimension_id',
            'scope',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
