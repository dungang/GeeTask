<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_id')->dropDownList(Team::allIdToName()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_date')->textInput()?>

    <?= $form->field($model, 'test_date')->textInput() ?>

    <?= $form->field($model, 'prod_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
