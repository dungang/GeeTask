<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaskDone */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '任务项目', 'url' => ['/task-item','TaskItem[plan_id]'=>$model->plan_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-done-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'item_id',
            'status_code',
            'remark:ntext',
            'created_at',
        ],
    ]) ?>

</div>
