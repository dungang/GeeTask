<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Team;
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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加计划', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
