<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var */
$this->title = "项目";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project">
	<h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('添加项目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'projectName',
            'description:ntext',
            'status',
            'region',
            'createTime:date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>