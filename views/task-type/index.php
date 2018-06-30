<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('添加Task Type', ['create'], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#task-dailog']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'type_code',
            'name',
            'intro',
            'created_at:datetime',
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
            ]
        ],
    ]); ?>
</div>
