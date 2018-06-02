<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Meet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meet-form">

    <?php $form = ActiveForm::begin(); ?>
	
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'meet_date')->textInput() ?></div><div class="col-md-8"><?= $form->field($model, 'actors')->textInput(['maxlength' => true]) ?></div>
    
</div>
    <?= $form->field($model, 'content')->widget(\dungang\ueditor\widgets\Editor::className(),[
        'serverUrl'=>['/tools/ueditor'],
        //（可选）增加编辑器按钮，1维数组（之支持一行显示，没有必要多行显示），官方是二维数组（多行工具）
        'toolBars'=>[
            'forecolor', 'backcolor', '|' ,'insertimage', 
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
