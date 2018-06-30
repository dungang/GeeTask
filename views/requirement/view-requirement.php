<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => '当前文档',
    'url' => [
        'index',
        'TaskItemSearch[project_id]'=>$model->project_id,
        'TaskItemSearch[project_version_id]'=>$model->project_version_id,
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
    <strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
	<div class="row">
    	<div class="col-md-7">
    	<?=DetailView::widget([
            'model' => $model,
        	    'attributes' => [
                        [
                            'label'=>'内容',
                            'format'=>'html',
                            'captionOptions' => ['width'=>'60px'],
                            'value'=>$content->content
                        ],
            ]])?>
        </div>
    	<div class="col-md-5">
		<?= $this->render("_source",['source'=>$source,'task_types'=>$task_types]) ?>
		<?= $this->render("_item",['model'=>$model,'content'=>$content,'task_types'=>$task_types,'users'=>$users,'plan'=>$plan,'taskStatuses'=>$taskStatuses]) ?>
		<?= $this->render("_histories",['model'=>$model,'users'=>$users]) ?>
    	</div>
    </div>
</div>
