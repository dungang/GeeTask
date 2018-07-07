<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\SimpleUploader;

/* @var $this yii\web\View */
/* @var $model app\models\VirtualUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="virtual-user-form">

    <?php $form = ActiveForm::begin(['id'=>'virtual-form']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(SimpleUploader::className(),[
        
    ]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
