<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserStoryMappingActivity */

$this->title = 'Update User Story Mapping Activity: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Story Mapping Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
    <?= $this->render('epic-feature-form', [
        'model' => $model,
    ]) ?>

</div>
