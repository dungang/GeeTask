<?php

use yii\helpers\Html;
use app\models\Project;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;


/* @var $this yii\web\View */
/* @var $model app\models\UserStory */

$project = Project::findOne($model->project_id);
$this->title = '更新 Bug';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $project->name, 'url' => ['desktop','id'=>$project->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
	<div class="user-story-form">

    <?php $form = ActiveForm::begin(['id'=>'bug-form']); ?>

    <?= $form->field($model, 'virtual_user_id')->dropDownList(VirtualUser::allIdToName('id','name',['project_id'=>$project->id]))->label('作为用户') ?>

    <?= $form->field($model, 'story')->textInput(['maxlength' => true])->label('我需要') ?>

    <?= $form->field($model, 'play')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

	</div>
</div>