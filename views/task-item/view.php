<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '任务计划', 'url' => ['/task-item','TaskItemSearch[plan_id]'=>$model->plan_id]];
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
            'plan_id',
            'status_code',
            'code',
            'name',
            'description',
            'target_date',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
