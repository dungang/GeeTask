<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '任务状态';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加任务状态', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'sort',
                'headerOptions'=>['width'=>'50px','class'=>'text-center'],
                'contentOptions'=>['width'=>'50px','class'=>'text-center'],
            ],
            'name',
            'code',
            'description:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
