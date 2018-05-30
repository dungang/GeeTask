<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AppModule */

$this->title = '更新模块: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => '系统模块', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="app-module-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
