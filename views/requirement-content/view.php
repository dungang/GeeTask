<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementContent */

$this->title = '历史内容';

?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>

    <?= Html::encode($this->title) ?>
    </div>
<div class="modal-body">
    <?=DetailView::widget(['model' => $model,'attributes' => [
        [
            'attribute'=>'created_at',
            'format'=>'datetime',
            'captionOptions'=>['width'=>'80px;'],
        ],
        'content:html',
    ]])?>

</div>
