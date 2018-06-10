<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectVersion */

$model->is_release == 1 ? $this->title =  '添加项目版本': '添加项目发布版本';
$this->params['breadcrumbs'][] = [
    'label' => '项目版本',
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
    <?=$this->render('_form', ['model' => $model])?>
</div>
