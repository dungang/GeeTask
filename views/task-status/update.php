<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */

$this->title = 'Update Task Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
