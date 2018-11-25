<?php
use yii\bootstrap\ActiveForm;
use app\models\VirtualUser;
use yii\helpers\Html;
?>


    <?php $form = ActiveForm::begin(['id'=>'story-form']); ?>

    <?= $form->field($model, 'virtual_user_id')->dropDownList(VirtualUser::allIdToName('id','name',['project_id'=>$project->id]))->label('作为用户') ?>

    <?= $form->field($model, 'story')->textInput(['maxlength' => true])->label('我需要') ?>
	
	<hr/>
	
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>