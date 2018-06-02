<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KnowledgeCategory */

$this->title = '更新知识分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '知识分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="knowledge-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
