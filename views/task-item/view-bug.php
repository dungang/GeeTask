<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => '任务计划',
    'url' => [
        '/task-item',
        'TaskItemSearch[plan_id]' => $model->plan_id
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
    	<div class="col-md-6">
		<?= $this->render("_item",['model'=>$model,'content'=>$content,'task_types'=>$task_types,'users'=>$users,'plan'=>$plan,'taskStatuses'=>$taskStatuses]) ?>
        </div>
    	<div class="col-md-6">
		<?= $this->render("_source",['source'=>$source,'task_types'=>$task_types]) ?>
		<?= $this->render("_histories",['model'=>$model,'users'=>$users]) ?>
    	</div>
    </div>
</div>
