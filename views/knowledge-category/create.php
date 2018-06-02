<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KnowledgeCategory */

$this->title = '添加知识分类';
$this->params['breadcrumbs'][] = ['label' => '知识分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledge-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
