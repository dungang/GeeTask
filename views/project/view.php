<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\widgets\SimpleModal;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '项目', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('添加项目', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('修改', ['delete', 'id' => $model->id], [
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
            'intro:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    
    <div class="row">
    	<div class="col-md-6">
    		<?=GridView::widget([
    		    'dataProvider'=>$projectVersionProvider,
    		    'layout'=>'{items}',
    		    'columns'=>[
    		        [
    		            'attribute'=>'name',
    		            'label'=>'项目版本号'
    		        ],
    		        ['class' => 'yii\grid\ActionColumn'],
    		    ]
    		]);?>
    		
        <?= Html::a('添加项目版本', ['/project-version/create-project-version','project_id'=>$model->id], 
            [
                'class' => 'btn btn-success',
                'data-toggle'=>'modal',
                'data-target'=>'#project-version-dailog',
                
            ]) ?>
    	</div>
    	<div class="col-md-6">
    		<?=GridView::widget([
    		    'dataProvider'=>$releaseVersionProvider,
    		    'layout'=>'{items}',
    		    'columns'=>[
    		        [
    		            'attribute'=>'name',
    		            'label'=>'项目发布版本号'
    		        ],
    		        ['class' => 'yii\grid\ActionColumn'],
    		    ]
    		]);?>
    		
        <?= Html::a('添加项目发布版本', ['/project-version/create-release-version','project_id'=>$model->id],
            [
                'class' => 'btn btn-success',
                'data-toggle'=>'modal',
                'data-target'=>'#project-version-dailog',
                
            ]) ?>
    	</div>
    </div>
	<?php
	SimpleModal::begin([
	    //'size'=>'modal-sm',
	    'header'=>'任务更新状态记录',
	    'options'=>['id'=>'project-version-dailog']
	]);
	echo "没有记录";
	SimpleModal::end();
	?>
</div>
