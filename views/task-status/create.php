<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */

$this->title = '添加Task Status';
$this->params['breadcrumbs'][] = ['label' => 'Task Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
