<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integration-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'method') ?>

    <?= $form->field($model, 'route') ?>

    <?= $form->field($model, 'experience_value') ?>

    <?php // echo $form->field($model, 'contribution_value') ?>

    <?php // echo $form->field($model, 'intro') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'repeat_times') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
