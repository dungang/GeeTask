<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\widgets\SimpleModal;
use app\models\DbName;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DbChangeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$dbName = "所有任务计划";
if(Yii::$app->request->get('title')) {
    $dbName = Yii::$app->request->get('title');
} else {
    
    if($searchModel->db_id && $dbNameModel = DbName::findOne(['id'=>$searchModel->db_id])){
        $dbName = $dbNameModel->name;
    }
}

$this->title = $dbName . ' - 数据库变更';
$this->params['breadcrumbs'][] = $this->title;
$users = User::allIdToName('id','nick_name');
?>
<div class="db-change-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'created_at',
                'format'=>'date',
                'headerOptions'=>['width'=>'100px'],
            ],
            [
                'attribute'=>'db_id',
                'filter'=>DbName::allIdToName(),
                'headerOptions'=>['width'=>'100px'],
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['db_id']];
                }
            ],
            'content:ntext',
            [
                'attribute'=>'creator_id',
                'headerOptions'=>['width'=>'70px'],
                'filter'=>$users,
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['creator_id']];
                }
            ],
            [
                'attribute'=>'user_id',
                'headerOptions'=>['width'=>'70px'],
                'filter'=>$users,
                'value'=>function($model,$key,$index,$column){
                    if(empty($model['user_id'])) return '';
                    return $column->filter[$model['user_id']];
                }
            ],
            [
                'attribute'=>'updated_at',
                'format'=>'date',
                'headerOptions'=>['width'=>'100px'],
            ],

            [
                'class' => '\app\components\ActionColumn',
                'headerOptions'=>['width'=>'100px'],
                'buttonsOptions'=>[
                    'update'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#db-change-dailog',
                    ],
                    'view'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#db-change-dailog',
                    ],
                ]
            ],
        ],
    ]); ?>
    <?php 
        SimpleModal::begin([
            'header'=>'更新计划',
            'options'=>['id'=>'db-change-dailog']
        ]);
        echo "没有记录";
        SimpleModal::end();
    ?>
</div>
