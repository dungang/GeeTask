<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Project;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName()) ?>

    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
