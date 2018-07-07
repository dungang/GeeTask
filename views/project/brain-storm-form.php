<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BrainStorm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brain-storm-form">

    <?php $form = ActiveForm::begin(['id'=>'brain-storm-form']); ?>

    <?= $form->field($model, 'theme')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
