<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Meet */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '会议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$user = User::findOne(['id'=>$model->user_id]);
?>
<div class="meet-view">

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
                'captionOptoins'=>['width'=>'100px'],
            ],
            'actors:ntext',
            'content:html',
            [
                'attribute'=>'user_id',
                'value'=>$user->nick_name,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
