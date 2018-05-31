<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskStatus;
use app\models\TaskPlan;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-item-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6">
		    <?= $form->field($model, 'code')->textInput() ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'plan_id')->dropDownList(TaskPlan::allIdToName()) ?>
            
            <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name')) ?>
		</div>
		<div class="col-md-6">

            <?= $form->field($model, 'status_code')->dropDownList(TaskStatus::allIdToName('code')) ?>
        
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'target_date')->textInput() ?>
		</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
