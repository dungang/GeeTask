<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementVersion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-version-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
