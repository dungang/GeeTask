<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AcRoute */

$this->title = '更新系统路由: ' . $model->description;
$this->params['breadcrumbs'][] = ['label' => '系统路由', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->description, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="ac-route-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
