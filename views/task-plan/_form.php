<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Team;
use app\models\TaskType;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <div class="row">
		<div class="col-md-3">
            <?= $form->field($model, 'task_type')->dropDownList(TaskType::allIdToName('type_code')) ?>
    	</div>
		<div class="col-md-3">
            <?= $form->field($model, 'team_id')->dropDownList(Team::allIdToName()) ?>
    	</div>
		<div class="col-md-3">
            <?=$form->field($model, 'plan_status')->dropDownList([0 => '关闭',1 => '活动'])?>
    	</div>
		<div class="col-md-3">
            <?= $form->field($model, 'target_version')->textInput(['maxlength' => true]) ?>
    	</div>
		<div class="col-md-3">
            <?= $form->field($model, 'target_date')->textInput()?>
    	</div>
		<div class="col-md-3">
            <?= $form->field($model, 'test_date')->textInput() ?>
    	</div>
		<div class="col-md-3">
            <?= $form->field($model, 'prod_date')->textInput() ?>
    	</div>
	</div>

	<div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
