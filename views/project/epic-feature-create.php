<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserStoryMappingActivity */

$this->title = '添加User Story Mapping Activity';
$this->params['breadcrumbs'][] = ['label' => 'User Story Mapping Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
