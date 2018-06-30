<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;
use app\models\TaskType;

/* @var $this yii\web\View */
/* @var $searchModel \app\models\TaskStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Statuses';
$this->params['breadcrumbs'][] = $this->title;
$taskTypes = TaskType::allIdToName('type_code');
$items = [];
foreach($taskTypes as $code=>$text){
    $active = false;
    if($searchModel->status_type == $code) {
        $active = true;
    }
    $items[] = [
        'label'=>$text,
        'url'=>['index','TaskStatusSearch[status_type]'=>$code],
        'active'=>$active
    ];
}
?>
<div class="task-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('添加Task Status', ['create','type'=>$searchModel->status_type], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#task-dailog']) ?>
    </p>
   <?=Tabs::widget([
       'items'=>$items
       
   ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>'{items}',
        'columns' => [
            'code',
            'name',
            'status_type',
            'intro',

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
       ]
    ]); ?>
</div>
