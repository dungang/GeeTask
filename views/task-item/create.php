<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = '添加任务项';
$this->params['breadcrumbs'][] = [
    'label' => '任务项',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>

    <?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?=$this->render('_form', ['model' => $model,'taskStatuses'=>$taskStatuses,'content'=>$content])?>

</div>
