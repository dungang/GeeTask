<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\KnowledgeCategory;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KnowledgeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '添加知识库';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledge-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加知识库', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            [
                'attribute'=>'category_id',
                'filter'=>KnowledgeCategory::allIdToName(),
                'value'=>function($model,$key,$index,$column){
                    $filter = $column->filter;
                    $val = $model['category_id'];
                    return isset($filter[$val])?$filter[$val]:'';
                }
            ],
            [
                'attribute'=>'user_id',
                'filter'=>User::allIdToName('id','nick_name'),
                'value'=>function($model,$key,$index,$column){
                    $filter = $column->filter;
                    $val = $model['user_id'];
                    return isset($filter[$val])?$filter[$val]:'';
                }
            ],
            'tags:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
