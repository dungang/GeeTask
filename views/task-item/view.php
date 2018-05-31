<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '任务计划', 'url' => ['/task-item','TaskItemSearch[plan_id]'=>$model->plan_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('添加', ['create','TaskItem[plan_id]'=>$model->plan_id], ['class' => 'btn btn-success']) ?>
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
            'plan_id',
            'status_code',
            'code',
            'name',
            'description',
            'target_date',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
