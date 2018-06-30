<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaskStatus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'status_type',
            'intro',
            'sort',
        ],
    ]) ?>

</div>
