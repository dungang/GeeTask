<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementVersion */

$this->title = '更新项目版本: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目需求版本', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="requirement-version-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
