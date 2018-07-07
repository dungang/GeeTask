<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\UserStoryMappingActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-story-mapping-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName()) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'epic' => 'Epic (骨架)', 'feature' => 'Feature (功能)']) ?>

    <?= $form->field($model, 'business_value')->textInput(['maxlength' => true])->label('为实现') ?>

    <?= $form->field($model, 'virtual_user_id')->dropDownList(VirtualUser::allIdToName())->label('作为用户') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('我需要') ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
