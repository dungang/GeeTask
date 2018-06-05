<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '计划', 'url' => ['index']];
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
            [
                'attribute'=>'team_id',
                'value'=>function($model){
                    if( $team = Team::find()->where(['id'=>$model['team_id']])->one() ) {
                        return $team->name;
                    }
                    return "";
                }
            ],
            'name',
            'target_version',
            'target_date',
            'test_date',
            'prod_date',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

</div>
