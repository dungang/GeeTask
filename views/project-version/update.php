<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectVersion */

$model->is_release == 1 ? $this->title =  '更新项目版本: ' . $model->name : '更新项目发布版本: ' . $model->name;;
$this->params['breadcrumbs'][] = [
    'label' => '项目版本',
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
    <?=$this->render('_form', ['model' => $model])?>
</div>
