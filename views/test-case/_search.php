<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskPlan;
use app\models\TaskStatus;
use app\models\User;
use app\models\Project;
use app\models\TaskType;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-item-search">

    <?php
    
    $form = ActiveForm::begin([
        'action' => [
            'index'
        ],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ]
    ]);
    ?>

	<div class="row">
		<div class="col-md-2">
    		<?= $form->field($model, 'code') ?>
		</div>
		<div class="col-md-4">
    		<?= $form->field($model, 'name') ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'plan_id')->dropDownList(TaskPlan::allIdToName(),['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name'),['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'status_code')->dropDownList($taskStatuses,['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName(),[
    		    'prompt'=>'请选择',
    		    'data-linkage'=>'select',
    		    'data-name'=>'project_id',
    		    'data-target'=>'#version-in-search'
    		]) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'project_version_id')->dropDownList([],[
    		    'prompt'=>'请选择',
    		    'id'=>'version-in-search',
    		    'data-linkage'=>'select',
    		    'data-value'=>$model->project_version_id,
    		    'data-url'=>\Yii::$app->urlManager->createUrl(['/project-version/versions-data'])
    		    
    		]) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'task_type_code')->dropDownList(TaskType::allIdToName('type_code'),['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label>
			<div class="form-group">
                <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
            </div>
		</div>
	</div>

<?php ActiveForm::end(); ?>

</div>
