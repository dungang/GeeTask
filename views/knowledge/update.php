<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Knowledge */

$this->title = '更新知识: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '知识库', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="knowledge-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
