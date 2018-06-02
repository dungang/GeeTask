<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = '添加需求文档';
$this->params['breadcrumbs'][] = ['label' => '需求文档', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
