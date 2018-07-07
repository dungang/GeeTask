<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $project app\models\Project */
/* @var $searchModel app\models\BrainStormSearch */

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
<h1>Project <?= Html::encode($this->title) ?> <small>头脑风暴</small>
</h1>
<div class="row">
	<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
	<div class="col-md-10">

		<p>
        <?= Html::a('添加风暴主题', ['brain-storm-create','BrainStorm[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
    </p>

    <?php
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'theme',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    $user_id = \Yii::$app->user->id;
                    if (($model->status == 'open' && $user_id == $model->creator_id) || $model->status == 'close') {
                        return Html::a($model['theme'], [
                            'brain-storm-wall',
                            'id' => $model['id']
                        ], [
                            'target' => '_blank'
                        ]);
                    } else {
                        return $model['theme'];
                    }
                }
            ],
            [
                'attribute' => 'creator_id',
                'filter' => Team::allIdToName(),
                'value' => function ($model, $key, $index, $column) {
                    return isset($column->filter[$model['creator_id']]) ? $column->filter[$model['creator_id']] : $model['creator_id'];
                }
            ],
            'status',
            'created_at:date',
            [
                'label' => '添加Idea',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    if ($model->status == 'open') {
                        return Html::a('添加', [
                            'brain-idea-create',
                            'Idea[project_id]' => $model['project_id'],
                            'Idea[brain_storm_id]' => $model['id']
                        ], [
                            'target' => '_blank'
                        ]);
                    } else {
                        return '-';
                    }
                }
            ],
            [
                'class' => '\app\components\ActionColumn',
                'actionPrefix' => 'brain-storm',
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
