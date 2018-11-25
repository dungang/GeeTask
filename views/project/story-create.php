<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\UserStory */

$project = Project::findOne($model->project_id);
$this->title = '添加 Story';
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $project->name,
    'url' => [
        'desktop',
        'id' => $project->id
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php $form = ActiveForm::begin(['id'=>'story-form']); ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-2"><?= $form->field($model, 'virtual_user_id')->dropDownList(VirtualUser::allIdToName('id','name',['project_id'=>$project->id]))->label('作为用户') ?>
    	</div>
		<div class="col-md-3"> <?= $form->field($model, 'biz_value')->textInput(['maxlength' => true])->label('为实现') ?></div>
		<div class="col-md-7"> <?= $form->field($model, 'story')->textInput(['maxlength' => true])->label('我需要') ?></div>
		<div class="collapse" id="detail-more">
		
    		<div class="col-md-5">
    			<?= $form->field($model, 'priority') ?>
    			<?= $form->field($model, 'points')?>
    		</div>
    		<div class="col-md-7">
    			<?= $form->field($model, 'remark')->textarea(['maxlength' => true,'rows'=>5]) ?>
    		</div>
    		<div class="col-md-12">
    			<?= $form->field($model, 'play')->widget(\dungang\ueditor\widgets\Editor::className(),[
                    'serverUrl'=>['/tools/ueditor'],
                    //（可选）增加编辑器按钮，1维数组（之支持一行显示，没有必要多行显示），官方是二维数组（多行工具）
                    'toolBars'=>[
                        'forecolor', 'backcolor', '|' ,'insertimage', 
                    ],
    			    'clientOptions' =>[
    			        'zIndex'=>'3000',
    			        'initialFrameHeight'=>240
    			        
    			    ]
                ])?>
    		</div>
		</div>
	</div>
</div>
<div class="modal-footer">
    <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    <a class="btn btn-link" href="#"  data-toggle="collapse" data-target="#detail-more">更多</a>
</div>
<?php ActiveForm::end(); ?>