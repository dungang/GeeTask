<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserStory */

$this->title = 'story#'.$model->id;
$this->params['breadcrumbs'][] = [
    'label' => 'User Stories',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">

    <?php
    
echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'virtual_user_id',
            'story',
            'remark',
            'points',
            'priority',
            'category',
            'status',
            'story_type',
            'play:ntext',
            'feature_id',
            'release_id',
            'sprint_id',
            'creator_id',
            'updator_id',
            'created_at:datetime',
            'updated_at:datetime',
            'in_mapping',
            'is_del'
        ]
    ])?>

</div>
