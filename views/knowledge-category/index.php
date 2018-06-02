<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KnowledgeCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '知识分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledge-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加知识分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'sort',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
