<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BrainStorm */

$this->title = '添加Brain Storm';
$this->params['breadcrumbs'][] = ['label' => 'Brain Storms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
