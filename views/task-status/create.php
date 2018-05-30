<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */

$this->title = '添加任务状态';
$this->params['breadcrumbs'][] = ['label' => '任务状态', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
