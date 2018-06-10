<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\JobPosition;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分记录';
$this->params['breadcrumbs'][] = $this->title;
$users = User::allIdToName('id','nick_name');
?>
<div class="integration-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'created_at',
                'format'=>'datetime',
                'headerOptions'=>['width'=>'160px'],
            ],
            [
                'attribute'=>'reciever_id',
                'headerOptions'=>['width'=>'65px'],
                'filter'=>$users,
                'value'=>function($model,$key,$index,$column) {
                    return $column->filter[$model['reciever_id']];
                }
            ],
            [
                'attribute'=>'job_position',
                'filter'=>JobPosition::allIdToName(),
                'headerOptions'=>['width'=>'100px'],
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['job_position']];
                }
            ],
            [
                'attribute'=>'name',
                'headerOptions'=>['width'=>'120px'],
            ],
            [
                'attribute'=>'creator_id',
                'headerOptions'=>['width'=>'65px'],
                'filter'=>$users,
                'value'=>function($model,$key,$index,$column) {
                return $column->filter[$model['creator_id']];
                }
            ],
            [
                'attribute'=>'expirence_scope',
                'headerOptions'=>['width'=>'50px'],
            ],
            [
                'attribute'=>'contribution_scope',
                'headerOptions'=>['width'=>'50px'],
            ],
            [
                'attribute'=>'route',
            ],
            [
                'attribute'=>'target',
                'headerOptions'=>['width'=>'100px'],
            ],
            [
                'attribute'=>'target_id',
                'headerOptions'=>['width'=>'50px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
                'headerOptions'=>['width'=>'70px'],
                
            ],
        ],
    ]); ?>
</div>
