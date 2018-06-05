<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\DbName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
