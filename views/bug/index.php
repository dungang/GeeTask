<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\StatusDataColumn;
use app\models\User;
use app\models\TaskType;
use app\widgets\LinkageSelect;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $plan->name . ' - BUG';
$this->params['breadcrumbs'][] = ['label' => '项目BUG', 'url' => ['/bug/project']];
$this->params['breadcrumbs'][] = $this->title;
$taskTypes = TaskType::allIdToName('type_code');
?>
<div class="task-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel,'taskStatuses'=>$taskStatuses]); ?>

    <p>
        <?= Html::a('添加任务项', ['create',
            'TaskItem[plan_id]'=>$searchModel->plan_id,
            'TaskItem[task_type_code]'=>$searchModel->task_type_code,
            'TaskItem[project_id]'=>$searchModel->project_id,
            'TaskItem[project_version_id]'=>$searchModel->project_version_id,
        ],
            ['class' => 'btn btn-success',
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-dailog']) ?>
    </p>
	<?php 
	   $users = User::allIdToName('id','nick_name');
	   $tableWidth = 1140;
	   
	   $colWidth = [
	       'code'=> 65, //编码
	       'charger'=> 60, //被指派人
	       'taskName'=> 260, //任务名称
	       'targetDate'=>100, //目标日期
	       'updater'=>60, //最后更新人
	       'sql'=>50, //SQL
	       'typeCode'=>50, //任务模型类型
	   ];
	   //状态
	   $statusWidth = $tableWidth;
	   foreach ($colWidth as $col=>$width) {
	       $statusWidth -= $width;
	   }
	   if(empty($taskStatuses)) {
// 	       $avgWidth = round($statusWidth / count($colWidth),2);
	       
// 	       foreach ($colWidth as $col => $width) {
// 	           $colWidth[$col] = $width + $avgWidth;
// 	       }
          $colWidth['taskName'] += $statusWidth;
	       
	   }
	   
	?>
    <?=  GridView::widget([
        'headerRowOptions'=>['id'=>'fixed-table-header'],
            'options'=>['id'=>'task-item-table','class' => 'grid-view'],
            'dataProvider' => $dataProvider,
            'columns' => [
                    [
                        'attribute'=>'id',
                        'headerOptions'=>['width'=>$colWidth['code'] . 'px','class'=>'text-center'],
                        'contentOptions'=>['width'=>$colWidth['code'] . 'px','class'=>'text-center'],
                    ],
                    [
                        'attribute'=>'user_id',
                        'headerOptions'=>['width'=>$colWidth['charger'] . 'px','class'=>'text-center'],
                        'contentOptions'=>['width'=>$colWidth['charger'] . 'px','class'=>'text-center'],
                        'format'=>'raw',
                        'value' => function($model,$key,$index,$column)use($users){
                        return Html::a($users[$model['user_id']],['update','id'=>$model['id']],
                            [
                                'data-pajx'=>'0',
                                'title'=>$model['name'],
                                'data-toggle'=>'modal',
                                'data-target'=>'#task-dailog'
                            ]);
                        }
                    ],
                    [
                        'attribute'=>'task_type_code',
                        'headerOptions'=>['width'=>$colWidth['typeCode'] . 'px','class'=>'text-center'],
                        'contentOptions'=>['width'=>$colWidth['typeCode'] . 'px','class'=>'text-center'],
                        'format'=>'raw',
                        'value' => function($model,$key,$index,$column)use($taskTypes){
                            return $taskTypes[$model['task_type_code']];
                        }
                    ],
                    [
                        'attribute'=>'name',
                        'headerOptions'=>['width'=>$colWidth['taskName'] . 'px'],
                        'contentOptions'=>['width'=>$colWidth['taskName'] . 'px'],
                        'format'=>'raw',
                        'value' => function($model,$key,$index,$column){
                            return Html::a($model['name'],['view','id'=>$model['id']],
                                [
                                    'data-pajx'=>'0',
                                    'title'=>$model['name'],
                                    'data-toggle'=>'modal',
                                    'data-target'=>'#task-dailog'
                                ]);
                        }
                    ],
                    [
                        'class'=>StatusDataColumn::className(),
                        'width'=>$statusWidth,
                        'headerOptions'=>['class'=>'text-center'],
                        'contentOptions'=>['class'=>'text-center'],
                        'attribute'=>'status_code',
                        'allStatus'=>$taskStatuses,
                        'value'=>function($model,$key,$index,$column){
                            return Html::a('<span class="glyphicon glyphicon-ok text-success"></span>',
                                ['process-done',
                                    'TaskDone[status_code]'=>$model['status_code'],
                                    'TaskDone[plan_id]'=>$model['plan_id'],
                                    'TaskDone[item_id]'=>$model['id'],
                                    'task_type'=>$model['task_type_code'],
                                    'title'=>$model['name']
                                   
                                ],
                                [
                                    'data-pajx'=>'0','title'=>'请添加操作日志',
                                    'data-toggle'=>'modal',
                                    'data-target'=>'#task-dailog'
                                ]);
                        }
                    ],
                    [
                        'attribute'=>'last_user_id',
                        'format'=>'raw',
                        'headerOptions'=>['width'=>$colWidth['updater'] . 'px','class'=>'text-center'],
                        'headerOptions'=>['width'=>$colWidth['updater'] . 'px','class'=>'text-center'],
                        'value'=>function($model,$key,$index,$column) use($users){
                            return empty($model['last_user_id'])?'': Html::a($users[$model['last_user_id']]
                                ,['process-logs','TaskDoneSearch[item_id]'=>$model['id'],'task_type'=>$model['task_type_code']],[
                                'data-toggle'=>'modal',
                                'data-target'=>'#task-dailog',
                            ]);
                        }
                    ],
                    [
                        'label'=>'SQL',
                        'headerOptions'=>['width'=>$colWidth['sql'] . 'px','class'=>'text-center'],
                        'contentOptions'=>['width'=>$colWidth['sql'] . 'px','class'=>'text-center'],
                        'format'=>'raw',
                        'value'=>function($model,$key,$index,$column){
                            return Html::a('SQL',['/db-change/modify','plan_id'=>$model['plan_id'],'item_id'=>$model['id']],[
                                'data-toggle'=>'modal',
                                'data-target'=>'#task-dailog',
                            ]);
                        }
                    ],
                    [
                        'attribute'=>'target_date',
                        'headerOptions'=>['width'=>$colWidth['targetDate'] . 'px','class'=>'text-center'],
                        'contentOptions'=>['width'=>$colWidth['targetDate'] . 'px','class'=>'text-center'],
                    ],
            ],
    ]); 
    ?>

	<?php LinkageSelect::widget();?>
</div>
