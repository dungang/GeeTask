<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobPosition */

$this->title = '更新工作岗位: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '工作岗位', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="job-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
