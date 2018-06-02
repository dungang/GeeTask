<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImRobot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="im-robot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'im_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'webhook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_full_class')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
