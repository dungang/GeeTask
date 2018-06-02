<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ImRobot;
use app\models\Project;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '团队';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('添加团队', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                return Html::a($model['name'],['/task-plan','TaskPlanSearch[team_id]'=>$model['id'],'title'=>$model['name']]);
                }
            ],
            [
                'attribute'=>'project_id',
                'filter'=>Project::allIdToName(),
                'value'=>function($model,$key,$index,$column){
                    $filter = $column->filter;
                    $project_id = $model['project_id'];
                    return isset($filter[$project_id]) ? $filter[$project_id]:'';
                }
            ],
            [
                'attribute'=>'im_robot_id',
                'filter'=>ImRobot::allIdToName(),
                    'value'=>function($model,$key,$index,$column){
                    $filter = $column->filter;
                    $im_robot_id = $model['im_robot_id'];
                    return isset($filter[$im_robot_id]) ? $filter[$im_robot_id]:'';
                }
            ],
            [
                'label'=>'计划',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    return Html::a('查看',['/task-plan','TaskPlanSearch[team_id]'=>$model['id'],'title'=>$model['name']]);
                }
            ],
            [
                'label'=>'成员',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    /* @var $model \app\models\Team */
                    /* @var $user \app\models\User */
                    $names = "";
                    foreach ($model->getChildren()->all() as $user) {
                        $names .= Html::tag('span',$user->nick_name,['class'=>'text-info']) . " ";
                    }
                    return $names;
                }
            ],
            'created_at:date',
            [
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    return Html::a('设置成员',['/team-user','team_id'=>$model['id'],'title'=>$model['name']]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
