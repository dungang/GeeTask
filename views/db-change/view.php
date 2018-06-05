<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DbChange */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '数据库变更', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'db_id',
            'task_item_id',
            'task_plan_id',
            'user_id',
            'content:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
