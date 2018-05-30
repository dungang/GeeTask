<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */

$this->title = '更新任务状态: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '任务状态', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="task-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
