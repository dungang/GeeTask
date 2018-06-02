<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ImRobot */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'IM机器人', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="im-robot-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'name',
            'im_name',
            'webhook',
            'code_full_class',
        ],
    ]) ?>

</div>
