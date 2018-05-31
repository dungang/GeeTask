<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\StatusDataColumn;
use app\models\TaskStatus;
use app\models\User;
use app\models\TaskPlan;
use app\widgets\FixedTableHeader;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$planName = "所有任务计划";
if(Yii::$app->request->get('title')) {
    $planName = Yii::$app->request->get('title');
} else {
    
    if($searchModel->plan_id && $plan = TaskPlan::findOne(['id'=>$searchModel->plan_id])){
        $planName = $plan->name;
    }
}
$this->title = $planName . ' - 任务项';
$this->params['breadcrumbs'][] = ['label' => '任务计划', 'url' => ['/task-plan']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加任务项', ['create','TaskItem[plan_id]'=>$searchModel->plan_id], ['class' => 'btn btn-success']) ?>
    </p>
	<?php $users = User::allIdToName('id','nick_name');?>
    <?=  GridView::widget([
        'headerRowOptions'=>['id'=>'fixed-table-header'],
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'code',
                'headerOptions'=>['style'=>'width:65px;','class'=>'text-center'],
                'contentOptions'=>['style'=>'width:65px;','class'=>'text-center'],
            ],
            [
                'attribute'=>'user_id',
                'headerOptions'=>['style'=>'width:60px;','class'=>'text-center'],
                'contentOptions'=>['style'=>'width:60px;','class'=>'text-center'],
                'value'=>function($model,$key,$index,$column) use($users){
                    return $users[$model['user_id']];
                }
            ],
            [
                'attribute'=>'name',
                'headerOptions'=>['style'=>'width:300px;'],
                'contentOptions'=>['style'=>'width:300px;'],
                'format'=>'raw',
                'value' => function($model,$key,$index,$column){
                    return Html::a($model['name'],['view','id'=>$model['id']],['data-pajx'=>'0','title'=>$model['description']]);
                }
            ],
            [
                'class'=>StatusDataColumn::className(),
                'headerOptions'=>['style'=>'width:73px;','class'=>'text-center'],
                'contentOptions'=>['style'=>'width:73px;','class'=>'text-center'],
                'attribute'=>'status_code',
                'allStatus'=>TaskStatus::allIdToName('code'),
                'value'=>function($model,$key,$index,$column){
                    return Html::a('<span class="glyphicon glyphicon-ok text-success"></span>',
                        ['/task-done/create',
                            'TaskDone[status_code]'=>$model['status_code'],
                            'TaskDone[plan_id]'=>$model['plan_id'],
                            'TaskDone[item_id]'=>$model['id'],
                            'title'=>$model['name']
                           
                        ],
                        ['data-pajx'=>'0','title'=>'请添加操作日志']);
                }
            ],
            [
                'attribute'=>'last_user_id',
                'headerOptions'=>['style'=>'width:60px;','class'=>'text-center'],
                'value'=>function($model,$key,$index,$column) use($users){
                return empty($model['last_user_id'])?'':$users[$model['last_user_id']];
                }
            ],
            [
                'attribute'=>'target_date',
                'headerOptions'=>['sytle'=>'width:80px;','class'=>'text-center'],
                'contentOptions'=>['sytle'=>'width:800px;','class'=>'text-center'],
            ],
        ],
    ]); 
    ?>
    <?php FixedTableHeader::widget(['options'=>['id'=>'fixed-table-header']]) ?>
</div>
