<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team_id')->dropDownList(Team::allIdToName()) ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'target_date') ?>

    <?= $form->field($model, 'test_date') ?>

    <?= $form->field($model, 'prod_date') ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
