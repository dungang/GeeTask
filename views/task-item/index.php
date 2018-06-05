<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\StatusDataColumn;
use app\models\TaskStatus;
use app\models\User;
use app\models\TaskPlan;
use app\widgets\FixedTableHeader;
use app\widgets\ToolTips;
use app\widgets\SimpleModal;
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
        <?= Html::a('添加任务项', ['create','TaskItem[plan_id]'=>$searchModel->plan_id], ['class' => 'btn btn-success',
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-done-dailog']) ?>
    </p>
	<?php 
	   $users = User::allIdToName('id','nick_name');
	   $tableWidth = 1140;
	   $codeWidth = 65;
	   $userWidth = 60;
	   $taskNameWidth= 260;
	   $dateWidth = 100;
	   $dbWidth = 50;
	   $statusWidth = $tableWidth - $codeWidth - $userWidth*2 - $taskNameWidth -$dbWidth - $dateWidth;
	?>
    <?=  GridView::widget([
        'headerRowOptions'=>['id'=>'fixed-table-header'],
        'options'=>['id'=>'task-item-table','class' => 'grid-view'],
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'code',
                'value'=>function($model,$key,$index,$column){
                    if(empty($model['code'])) {
                        return 'L'.$model['id'];
                    } else {
                        return $model['code'];
                    }
                },
                'headerOptions'=>['width'=>$codeWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$codeWidth . 'px','class'=>'text-center'],
            ],
            [
                'attribute'=>'user_id',
                'headerOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'format'=>'raw',
                'value' => function($model,$key,$index,$column)use($users){
                    return Html::a($users[$model['user_id']],['update','id'=>$model['id']],
                        [
                            'data-pajx'=>'0',
                            'title'=>$model['name'],
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-done-dailog'
                        ]);
                    }
            ],
            [
                'attribute'=>'name',
                'headerOptions'=>['width'=>$taskNameWidth . 'px'],
                'contentOptions'=>['width'=>$taskNameWidth . 'px'],
                'format'=>'raw',
                'value' => function($model,$key,$index,$column){
                    return Html::a($model['name'],['view','id'=>$model['id']],
                        [
                            'data-pajx'=>'0',
                            'title'=>$model['name'],
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-done-dailog'
                        ]);
                }
            ],
            [
                'class'=>StatusDataColumn::className(),
                'width'=>$statusWidth,
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],
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
                        [
                            'data-pajx'=>'0','title'=>'请添加操作日志',
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-done-dailog'
                        ]);
                }
            ],
            [
                'attribute'=>'last_user_id',
                'format'=>'raw',
                'headerOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'headerOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'value'=>function($model,$key,$index,$column) use($users){
                    return empty($model['last_user_id'])?'': Html::a($users[$model['last_user_id']]
                        ,['/task-done/index','TaskDoneSearch[item_id]'=>$model['id']],[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-done-dailog',
                    ]);
                }
            ],
            [
                'label'=>'SQL',
                'headerOptions'=>['width'=>$dbWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$dbWidth . 'px','class'=>'text-center'],
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    return Html::a('变更',['/db-change/modify','plan_id'=>$model['plan_id'],'item_id'=>$model['id']],[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-done-dailog',
                    ]);
                }
            ],
            [
                'attribute'=>'target_date',
                'headerOptions'=>['width'=>$dateWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$dateWidth . 'px','class'=>'text-center'],
            ],
        ],
    ]); 
    ?>
    <?php 
    FixedTableHeader::widget(['options'=>['id'=>'fixed-table-header']]);
    ToolTips::widget(['options'=>['id'=>'task-item-table [data-toggle="tooltip"]']]);
    SimpleModal::begin([
        'size'=>'modal-lg',
        'header'=>'任务更新状态记录',
        'options'=>['id'=>'task-done-dailog']
    ]);
    echo "没有记录";
    SimpleModal::end();
    ?>
</div>
