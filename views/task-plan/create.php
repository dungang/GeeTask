<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */

$this->title = '添加计划';
$this->params['breadcrumbs'][] = ['label' => '计划', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
