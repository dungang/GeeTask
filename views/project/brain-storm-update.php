<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BrainStorm */

$this->title = 'Update Brain Storm: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Brain Storms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
    <?= $this->render('brain-storm-form', [
        'model' => $model,
    ]) ?>

</div>
