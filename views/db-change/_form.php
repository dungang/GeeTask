<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DbName;

/* @var $this yii\web\View */
/* @var $model app\models\DbChange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-change-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'db_id')->dropDownList(DbName::allIdToName()) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
