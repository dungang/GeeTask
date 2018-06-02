<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ImRobot */

$this->title = '更新IM机器人: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'IM机器人', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="im-robot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
