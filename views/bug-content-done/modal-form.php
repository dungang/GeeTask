<?php
use yii\bootstrap\Html;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<?= Html::encode(Yii::$app->request->get('title') . ' - 日志') ?>
</div>
<div class="modal-body">
<?=$this->render('_form', ['model' => $model])?>
</div>