<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementContent */

$this->title = 'Update Requirement Content: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requirement Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requirement-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
