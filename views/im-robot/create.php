<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ImRobot */

$this->title = '添加IM机器人';
$this->params['breadcrumbs'][] = ['label' => 'IM机器人', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="im-robot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
