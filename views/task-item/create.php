<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = '添加任务项';
$this->params['breadcrumbs'][] = ['label' => '任务项', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
