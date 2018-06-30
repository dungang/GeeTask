<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskPlan;
use app\models\User;
use app\widgets\LinkageSelect;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-item-form">

    <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'project_id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'project_version_id')->hiddenInput()->label(false)?>
	<div class="row">
		<div class="col-md-3">
            <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-9">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-6">
            <?= $form->field($model, 'plan_id')->dropDownList(TaskPlan::allIdToName('id','name',['task_type'=>$model->task_type_code])) ?>
		</div>
		<div class="col-md-6">
            <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name')) ?>
		</div>
	</div>

	<div class="form-group">
        <?php
        
if (! $model->isNewRecord)
            echo Html::a('删除', [
                'delete',
                'id' => $model->id
            ], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post'
                ]
            ]);
        ?>
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	<?php LinkageSelect::widget();?>
</div>
