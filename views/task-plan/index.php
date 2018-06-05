<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Team;
use app\widgets\SimpleModal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$teamName = "所有团队";
if(Yii::$app->request->get('title')) {
    $teamName = Yii::$app->request->get('title');
} else  if($searchModel->team_id && $team = Team::findOne(['id'=>$searchModel->team_id])){
    $teamName = $team->name;
}
$this->title = $teamName . ' - 计划';

$this->params['breadcrumbs'][] = [
    'label' => '团队',
    'url' => [
        '/team'
    ]
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加计划', ['create'], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#task-plan-dailog',
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) {
                    return Html::a($model['name'],['/task-item','TaskItemSearch[plan_id]'=>$model['id'],'title'=>$model['name']]);
                }
            ],
            'target_version',
            [
                'attribute'=>'team_id',
                'filter'=>Team::allIdToName(),
                'value'=>function($model,$key,$index,$column) {
                    /* @var $column \yii\grid\DataColumn */
                    return $column->filter[$model['team_id']];
                }
            ],
            [
                'attribute'=>'plan_status',
                'filter'=>['0'=>'关闭','1'=>'活动'],
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) {
                    return Html::tag('span',$model['plan_status']?'活动':'关闭',['class'=>$model['plan_status']?'text-success':'text-danger']) ;
                }
            ],
            [
                'attribute'=>'target_date',
                'headerOptions'=>['width'=>'120px','class'=>'text-center'],
            ],
            [
                'attribute'=>'test_date',
                'headerOptions'=>['width'=>'120px','class'=>'text-center'],
            ],
            [
                'attribute'=>'prod_date',
                'headerOptions'=>['width'=>'120px','class'=>'text-center'],
            ],
            [
                'label'=>'SQL变更',
                'headerOptions'=>['width'=>'100px','class'=>'text-center'],
                'format'=>'html',
                'value' => function($model,$key,$index,$column){
                return Html::a('查看',['/db-change','DbChangeSearch[task_plan_id]'=>$model->id]);
                }
            ],
            [
                'class' => '\app\components\ActionColumn',
                'buttonsOptions'=>[
                    'update'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-plan-dailog',
                    ],
                    'view'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-plan-dailog',
                    ],
                ]
            ],
        ],
    ]); ?>
        <?php 
            SimpleModal::begin([
                'header'=>'更新计划',
                'options'=>['id'=>'task-plan-dailog']
            ]);
            echo "没有记录";
            SimpleModal::end();
        ?>
</div>
