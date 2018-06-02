<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Knowledge */

$this->title = '添加知识库';
$this->params['breadcrumbs'][] = ['label' => '添加知识库', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
