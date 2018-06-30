<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskType;

/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_type')->dropDownList(TaskType::allIdToName('type_code'), ['prompt' => '']) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
