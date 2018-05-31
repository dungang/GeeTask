<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskPlan;
use app\models\TaskStatus;
use app\models\User;

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
		<div class="col-md-2">
    		<?= $form->field($model, 'name') ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'plan_id')->dropDownList(TaskPlan::allIdToName(),['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name'),['prompt'=>'请选择']) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'status_code')->dropDownList(TaskStatus::allIdToName('code'),['prompt'=>'请选择']) ?>
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
