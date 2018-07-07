<?php
use yii\helpers\Html;
use app\models\Project;
use app\widgets\TreeGrid;
use app\models\VirtualUser;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $project app\models\Project */
/* @var $searchModel app\models\UserStoryMappingActivitySearch */

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
<h1>Project <?= Html::encode($this->title) ?> <small>活动骨架</small>
</h1>
<div class="row">
	<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
	<div class="col-md-10">

		<p>
		        <?= Html::a('添加活动', ['epic-feature-create','UserStoryMappingActivity[project_id]'=>$project->id,'UserStoryMappingActivity[type]'=>'epic'], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
    </p>

    <?php
    $dataProvider->pagination = false;
    $virtualUsers = VirtualUser::allIdToName('id', 'name', [
        'project_id' => $project->id
    ]);
    echo TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => '我需要',
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    $link = Html::a($model['title'], [
                        'epic-feature-view',
                        'id' => $model['id']
                    ], [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-dailog'
                    ]);
                    if ($model['type'] == 'epic') {
                        $link .= ' ' . Html::a('添加骨架', [
                            'epic-feature-create',
                            'UserStoryMappingActivity[project_id]' => $model->project_id,
                            'UserStoryMappingActivity[type]' => 'feature',
                            'UserStoryMappingActivity[pid]' => $model->id
                        ], [
                            'class' => 'text-muted',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal-dailog'
                        ]);
                    }
                    return $link;
                }
            ],
            'type',
            [
                'label' => '作为用户',
                'attribute' => 'virtual_user_id',
                'headerOptions' => [
                    'width' => '100px'
                ],
                'content' => function ($model) use ($virtualUsers) {
                return isset($virtualUsers[$model['virtual_user_id']])?$virtualUsers[$model['virtual_user_id']]:'';
                }
            ],
            [
                'label' => '为实现',
                'attribute' => 'business_value'
            ],
            [
                'class' => '\app\components\ActionColumn',
                'headerOptions' => [
                    'width' => '100px'
                ],
                'actionPrefix' => 'epic-feature',
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
