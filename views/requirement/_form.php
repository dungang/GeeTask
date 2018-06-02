<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Project;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->hiddenInput()->label(FALSE) ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name')) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
