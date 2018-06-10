<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestCase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-case-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'version_id')->textInput() ?>

    <?= $form->field($model, 'pid')->textInput() ?>

    <?= $form->field($model, 'source_type')->dropDownList([ 'requirement' => 'Requirement', 'bug' => 'Bug', 'case' => 'Case', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
