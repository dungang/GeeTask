<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AppModule */

$this->title = '添加模块';
$this->params['breadcrumbs'][] = ['label' => '系统模块', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
