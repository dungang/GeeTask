<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DbName */

$this->title = 'Update Db Name: ' . $model->name;
$this->params['breadcrumbs'][] = [
    'label' => '数据库',
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
