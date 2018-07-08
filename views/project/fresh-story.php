<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;
use app\models\VirtualUser;
use app\models\User;
use yii\grid\CheckboxColumn;
use app\widgets\BatchProcess;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $project app\models\Project */
/* @var $searchModel app\models\UserStorySearch */

$project = Project::findOne($searchModel->project_id);
$this->title = $project->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Project <?= Html::encode($this->title) ?> <small>新鲜故事</small>
</h1>
<div class="row">
	<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
	<div class="col-md-10">

		<p>
        <?php echo  Html::a('添加 Story', ['story-create','Story[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
        <?php echo  Html::a('添加 BUG', ['bug-create','Bug[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
        <?php echo  Html::a('添加 Spike', ['spike-create','Spike[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>

        <?php echo  Html::a('批量添加', ['userstory-batch-create','UserStory[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
        <?php echo  Html::a('批量修改', ['userstory-batch-update','UserStory[project_id]'=>$project->id], ['id'=>'batch-update','class' => 'batch-process btn btn-success','data-target'=>'#modal-dailog']) ?>
        <?php echo  Html::a('批量删除', ['userstory-batch-delete','UserStory[project_id]'=>$project->id], ['id'=>'batch-delete','class' => 'batch-process btn btn-danger']) ?>
        <?php echo  Html::a('批量转 Product Backlog', ['userstory-batch-convert','UserStory[project_id]'=>$project->id], ['id'=>'batch-convert','class' => 'batch-process btn btn-danger','data-param'=>'{"UserStory[category]":"ProductBacklog"}']) ?>
    
    </p>

    <?php

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => CheckboxColumn::className(),
                'name' => 'id'
            ],
            [
                'attribute' => 'id',
                'headerOptions' => [
                    'width' => '80px'
                ]
            ],
            [
                'attribute' => 'story_type',
                'filter' => [
                    'Story' => 'Story',
                    'Bug' => 'Bug',
                    'Spike' => 'Spike'
                ],
                'headerOptions' => [
                    'width' => '100px'
                ]
            ],
            'biz_value',
            [
                'label' => '作为用户',
                'attribute' => 'virtual_user_id',
                'filter' => VirtualUser::allIdToName('id', 'name', [
                    'project_id' => $project->id
                ]),
                'headerOptions' => [
                    'width' => '100px'
                ],
                'content' => function ($model, $key, $index, $column) {
                    return isset($column->filter[$model['virtual_user_id']]) ? $column->filter[$model['virtual_user_id']] : '';
                }
            ],
            [
                'label' => '我需要',
                'attribute' => 'story',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a($model['story'], [
                        strtolower($model->story_type) . '-view',
                        'id' => $model['id']
                    ], [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-dailog'
                    ]);
                }
            ],
            [
                'attribute' => 'priority',
                'headerOptions' => [
                    'width' => '60px'
                ]
            ],
            [
                'attribute' => 'creator_id',
                'filter' => User::allIdToName('id', 'nick_name'),
                'headerOptions' => [
                    'width' => '100px'
                ],
                'content' => function ($model, $key, $index, $column) {
                    return $column->filter[$model['creator_id']];
                }
            ],
            [
                'class' => '\app\components\ActionColumn',
                'headerOptions' => [
                    'width' => '80px'
                ],
                'actionPrefix' => function ($model) {
                    return strtolower($model->story_type);
                },
                'buttonsOptions' => [
                    'update' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-dailog'
                    ],
                    'view' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-dailog'
                    ]
                ]
            ]
        ]
    ]);
    // BatchLoad::widget([
    // 'id'=>'batch-update',
    // ]);
    BatchProcess::widget([
        'id' => 'batch-update',
        'clientOptions' => [
            'mode' => 'modal',
            'needConfirm' => false
        ]
    ]);
    BatchProcess::widget([
        'id' => 'batch-delete',
        'clientOptions' => [
            'mode' => 'delete'
        ]
    ]);
    BatchProcess::widget([
        'id' => 'batch-convert',
        'clientOptions' => [
            'mode' => 'quiet',
            'confirm'=>'确定转到Product Backlog中？'
        ]
    ]);
    ?>
</div>
</div>
