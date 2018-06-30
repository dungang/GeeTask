<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<?= Html::encode(Yii::$app->request->get('title') . ' - 日志') ?>
</div>
<div class="modal-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_code')->dropDownList($taskStatuses) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>