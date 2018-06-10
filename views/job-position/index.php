<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '工作岗位';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('添加工作岗位', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'intro',
            'sort',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
