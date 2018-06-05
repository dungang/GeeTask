<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DbChange */

$this->title = '更新数据库变更: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '数据库变更', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
