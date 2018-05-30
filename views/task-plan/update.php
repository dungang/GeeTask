<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */

$this->title = '更新计划: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '计划', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="task-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
