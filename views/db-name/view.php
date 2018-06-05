<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DbName */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '数据库', 'url' => ['index']];
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
            'project_id',
            'name',
            'intro',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
