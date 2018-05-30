<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\User;
use app\models\TaskStatus;


/* @var $this yii\web\View */
/* @var $model app\models\TaskDone */

$this->title = '添加任务日志';
$this->params['breadcrumbs'][] = ['label' => '任务计划', 'url' => ['/task-item','TaskItemSearch[plan_id]'=>$model->plan_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-8">
		<div class="task-done-index">
        
            <h1><?= Html::encode(Yii::$app->request->get('title') . ' - 日志') ?></h1>
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'created_at:datetime',
                    [
                        'attribute'=>'user_id',
                        'filter'=>User::allIdToName('id','nick_name'),
                        'value'=>function($model,$key,$index,$column){
                            return $column->filter[$model['user_id']];
                        }
                    ],
                    [
                        'attribute'=>'status_code',
                        'filter'=>TaskStatus::allIdToName('code'),
                        'value'=>function($model,$key,$index,$column){
                            return $column->filter[$model['status_code']];
                        }
                    ],
                    'remark:ntext',
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
	</div>
	<div class="col-md-4">
	
        <div class="task-done-create">
        
            <h1><?= Html::encode($this->title) ?></h1>
        
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        
        </div>
	</div>
</div>
