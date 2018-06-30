<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TaskPlan;
use app\models\User;
use app\models\Project;
use app\widgets\LinkageSelect;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-item-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?php if(!$model->isNewRecord) echo Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
	<div class="row">
		<div class="col-md-4">
            <?= $form->field($model, 'plan_id')->dropDownList(TaskPlan::allIdToName()) ?>
		</div>
		<div class="col-md-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-4">
            <?= $form->field($model, 'user_id')->dropDownList(User::allIdToName('id','nick_name')) ?>
		</div>
		<div class="col-md-4">
		    <?= $form->field($model, 'code')->textInput() ?>
		</div>
		<div class="col-md-4">
            <?= $form->field($model, 'target_date')->textInput() ?>
		</div>
		<div class="col-md-4">
            <?= $form->field($model, 'project_id')->dropDownList(Project::allIdToName(),[
    		    'prompt'=>'请选择',
    		    'data-linkage'=>'select',
    		    'data-name'=>'project_id',
    		    'data-target'=>'#version-in-form'
    		]) ?>
		</div>
		<div class="col-md-4">
            <?= $form->field($model, 'project_version_id')->dropDownList([],[
    		    'prompt'=>'请选择',
    		    'id'=>'version-in-form',
    		    'data-linkage'=>'select',
    		    'data-value'=>$model->project_version_id,
    		    'data-url'=>\Yii::$app->urlManager->createUrl(['/project-version/versions-data'])
    		    
    		]) ?>
		</div>
		<div class="col-md-4">
            <?= $form->field($model, 'status_code')->dropDownList($taskStatuses) ?>
		</div>
		<div class="col-md-12">
		    <?= $form->field($content, 'content')->widget(\dungang\ueditor\widgets\Editor::className(),[
                'serverUrl'=>['/tools/ueditor'],
                //（可选）增加编辑器按钮，1维数组（之支持一行显示，没有必要多行显示），官方是二维数组（多行工具）
                'toolBars'=>[
                    'forecolor', 'backcolor', '|' ,'insertimage', 
                ],
		        'clientOptions'=>['initialFrameHeight'=>'200']
            ]) ?>
		</div>
	</div>

    <div class="form-group">
        <?php if(!$model->isNewRecord) echo Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	<?php LinkageSelect::widget();?>
</div>
