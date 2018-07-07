<?php
use yii\helpers\Html;
use app\models\BrainStorm;
use app\models\Project;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Idea;

/* @var $this yii\web\View */
/* @var $model app\models\Idea */

$brainStorm = BrainStorm::findOne($model->brain_storm_id);

$project = Project::findOne($brainStorm->project_id);

$this->title = '添加Idea';
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'project/index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $project->name,
    'url' => [
        'project/desktop',
        'id' => $project->id
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Brain Storms',
    'url' => [
        'project/brain-storm'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($brainStorm->theme) ?></h1>
<div class="modal-body">
    <?php echo $this->render('brain-idea-form', ['model' => $model])?>
      <?php
    
    $columns = [
        
        'attribute' => 'id',
        'content',
        'convert_type',
        'created_at:datetime',
        'is_del'
    ];
    
    if ($brainStorm->status == 'open') {
        array_push($columns, 
        [
            'class' => '\app\components\ActionColumn',
            'template' => '{delete}'
        ]);
    }
    
    echo GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Idea::find()->where([
                'brain_storm_id' => $brainStorm->id,
                'creator_id' => \Yii::$app->user->id
            ])
        ]),
        'columns' => $columns
    ]);
    ?>
</div>
