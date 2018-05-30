<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = '更新任务项: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="task-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
