<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meet */

$this->title = '更新会议: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '会议', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="meet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
