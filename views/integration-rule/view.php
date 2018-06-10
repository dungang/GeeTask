<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\JobPosition;

/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '积分规则', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$jobPositions = JobPosition::allIdToName();
?>
<div class="integration-rule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'method',
            'route',
            'intro:ntext',
            'created_at:datetime',
        ],
    ]) ?>
    	<?= GridView::widget([
    	    'dataProvider'=>$dataProvider,
    	    'layout'=>'{items}',
    	    'columns'=>[
    	        [
    	            'attribute'=>'job_position',
    	            'value'=>function($model,$key,$index,$column) use($jobPositions) {
    	               return $jobPositions[$model['job_position']];
    	            }
    	        ],
    	        'experience_value',
	            'contribution_value',
	            'repeat_times',
    	    ]
    	]);?>
</div>
