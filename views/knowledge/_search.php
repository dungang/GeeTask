<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\KnowledgeCategory;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\KnowledgeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="knowledge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'category_id')->dropDownList(KnowledgeCategory::allIdToName()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name')) ?>

    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
