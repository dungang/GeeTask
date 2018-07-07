<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;
use app\models\VirtualUser;
use app\models\User;

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
<h1>Project <?= Html::encode($this->title) ?> <small>Product Backlog</small>
</h1>
<div class="row">
	<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
	<div class="col-md-10">

    <?php
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                'filter' => VirtualUser::allIdToName('id','name',['project_id'=>$project->id]),
                'headerOptions' => [
                    'width' => '100px'
                ],
                'content' => function ($model, $key, $index, $column) {
                    return $column->filter[$key];
                }
            ],
            [
                'label' => '我需要',
                'attribute' => 'story',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a($model['story'], [
                        'view-' . strtolower($model->story_type),
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
                'class' => '\app\components\ActionColumn',
                'headerOptions' => [
                    'width' => '80px'
                ],
                'actionSuffix' => function ($model) {
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
    ?>
</div>
</div>
