<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Team;
use app\models\TaskType;
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
            'data-target'=>'#task-dailog',
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'task_type',
                'headerOptions'=>['width'=>'60px','class'=>'text-center'],
                'filter'=>TaskType::allIdToName('type_code'),
                'value'=>function($model,$key,$index,$column) {
                    return $column->filter[$model['task_type']];
                }
            ],
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) {
                    return Html::a($model['name'],['/task-item','TaskItemSearch[plan_id]'=>$model['id'],'title'=>$model['name']]);
                }
            ],
            [
                'attribute'=>'target_version',
                'headerOptions'=>['width'=>'60px','class'=>'text-center'],
            ],
            [
                'attribute'=>'team_id',
                'headerOptions'=>['width'=>'120px','class'=>'text-center'],
                'filter'=>Team::allIdToName(),
                'value'=>function($model,$key,$index,$column) {
                    /* @var $column \yii\grid\DataColumn */
                    return $column->filter[$model['team_id']];
                }
            ],
            [
                'attribute'=>'plan_status',
                'filter'=>['0'=>'关闭','1'=>'活动'],
                'headerOptions'=>['width'=>'80px','class'=>'text-center'],
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
                'label'=>'SQL',
                'headerOptions'=>['width'=>'50px','class'=>'text-center'],
                'format'=>'raw',
                'value' => function($model,$key,$index,$column){
                    return Html::a('SQL',['/db-change','DbChangeSearch[task_plan_id]'=>$model->id]);
                }
            ],
            [
                'class' => '\app\components\ActionColumn',
                'buttonsOptions'=>[
                    'update'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-dailog',
                    ],
                    'view'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-dailog',
                    ],
                ]
            ],
        ],
    ]); ?>
</div>
