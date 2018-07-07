<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VirtualUser */

$this->title = '添加Virtual User';
$this->params['breadcrumbs'][] = ['label' => 'Virtual Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
    <?= $this->render('virtual-user-form', [
        'model' => $model,
    ]) ?>
</div>