<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = '添加文档';
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
    <?=$this->render('_form', ['model' => $model,'taskStatuses'=>$taskStatuses,'content'=>$content])?>

</div>
