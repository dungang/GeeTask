<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BrainStorm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Brain Storms', 'url' => ['index']];
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
            'project_id',
            'theme',
            'creator_id',
            'updator_id',
            'created_at:datetime',
            'updated_at:datetime',
            'is_del',
        ],
    ]) ?>

</div>
