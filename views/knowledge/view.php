<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\KnowledgeCategory;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Knowledge */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '知识库', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$category = KnowledgeCategory::findOne(['id'=>$model->category_id]);
$author = User::findOne(['id'=>$model->user_id]);
?>
<div class="knowledge-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'title',
                'captionOptions'=>['width'=>'120px'],
            ],
            [
                'attribute'=>'category_id',
                'value'=>$category->name
            ],
//             [
//                 'attribute'=>'user_id',
//                 'value'=>$author->nick_name
//             ],
            'tags:ntext',
            'content:html',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
