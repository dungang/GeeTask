<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserStoryMappingActivity */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Story Mapping Activities', 'url' => ['index']];
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
            'virtual_user_id',
            'title',
            'type',
            'business_value',
        ],
    ]) ?>

</div>
