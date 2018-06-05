<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;
use app\widgets\SimpleModal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DbNameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '数据库';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-name-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加数据库', ['create'], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#db-name-dailog',
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            [
                'attribute'=>'project_id',
                'filter'=>Project::allIdToName(),
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['project_id']];
                }
            ],
            'intro',
            'created_at:datetime',
            [
                'class' => '\app\components\ActionColumn',
                'buttonsOptions'=>[
                    'update'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#db-name-dailog',
                    ],
                    'view'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#db-name-dailog',
                    ],
                ]
            ],
        ],
    ]); ?>
         <?php 
            SimpleModal::begin([
                'header'=>'更新计划',
                'options'=>['id'=>'db-name-dailog']
            ]);
            echo "没有记录";
            SimpleModal::end();
        ?>
</div>
