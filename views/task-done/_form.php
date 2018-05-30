<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskStatus;

/* @var $this yii\web\View */
/* @var $model app\models\TaskDone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-done-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_code')->dropDownList(TaskStatus::allIdToName('code')) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
