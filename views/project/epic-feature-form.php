<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;

/* @var $this yii\web\View */
/* @var $model app\models\UserStoryMappingActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-story-mapping-activity-form">

    <?php $form = ActiveForm::begin(['id'=>'epic-feature-form']); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'epic' => 'Epic (活动)', 'feature' => 'Feature (骨架)']) ?>

    <?= $form->field($model, 'business_value')->textInput(['maxlength' => true])->label('为实现') ?>

    <?= $form->field($model, 'virtual_user_id')->dropDownList(VirtualUser::allIdToName('id','name',['project_id'=>$model->project_id]))->label('作为用户') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('我需要') ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>