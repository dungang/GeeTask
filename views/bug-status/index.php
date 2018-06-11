<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BugStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bug Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bug Status', ['create'], ['class' => 'btn btn-success']) ?>
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
            'intro:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
