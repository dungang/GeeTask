<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImRobotSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="im-robot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'im_name') ?>

    <?= $form->field($model, 'code_full_class') ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
