<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
<div class="sprint-index">

	<h1>Project <?= Html::encode($this->title) ?> <small>Sprints</small>
	</h1>
	<div class="row">
		<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
		<div class="col-md-10">

			<p>
        <?= Html::a('添加 Sprint', ['sprint-create','Sprint[project_id]'=>$project->id], ['class' => 'btn btn-success','data-toggle'=>'modal','data-target'=>'#modal-dailog']) ?>
    </p>

    <?php
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label'=>'Sprint',
                'attribute' => 'sequence',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a('Sprint#'.$model['sequence'], [
                        'sprint-kanban',
                        'id' => $model['id']
                    ]);
                }
            ],
            'title',
            'start_date',
            'end_date',
            
            [
                'class' => '\app\components\ActionColumn',
                'actionPrefix'=>'sprint',
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
</div>
