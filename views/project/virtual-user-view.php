<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VirtualUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Virtual Users', 'url' => ['index']];
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
            'name',
            'role',
            'photo',
            'intro:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            'is_del',
        ],
    ]) ?>

</div>
