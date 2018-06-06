<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatisticalTarget */

$this->title = 'Update Statistical Target: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Statistical Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statistical-target-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
