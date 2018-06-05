<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DbName */

$this->title = '添加数据库';
$this->params['breadcrumbs'][] = [
    'label' => '数据库',
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
