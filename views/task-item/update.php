<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = '更新任务项: ' . $model->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Task Items',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $model->name,
    'url' => [
        'view',
        'id' => $model->id
    ]
];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
<?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?=$this->render('_form', ['model' => $model,'content'=>$content,'taskStatuses'=>$taskStatuses])?>
</div>
