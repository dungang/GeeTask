<?php

use yii\helpers\Html;
use app\widgets\TreeGrid;
use app\models\RequirementVersion;
use app\models\Project;
use app\widgets\SimpleModal;
use app\models\ProjectVersion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label'=>'项目需求文档',
    'url'=>['project']
];

if(($projectName = \Yii::$app->request->get('project_name')) && ($version = \Yii::$app->request->get('version'))) {
    $this->title = $projectName . ' ' . $version;
} else {
    $version = ProjectVersion::findOne(['id'=>$searchModel->project_version_id]);
    $project = Project::findOne(['id'=>$searchModel->project_id]);
    $this->title = $project->name . ' ' . $version->name;
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加需求文档', ['create','pid'=>'0',
            'TaskItem[task_type_code]'=>$searchModel->task_type_code,
            'TaskItem[project_id]'=>$searchModel->project_id,
            'TaskItem[project_version_id]'=>$searchModel->project_version_id
            
        ], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#task-dailog',
        ]) ?>
    </p>

    <?= TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName'=>'id',
        'parentColumnName'=>'pid',
        'columns' => [
            [
                'attribute'=>'name',
                'label'=>'目录',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    $actions = [];
                    $actions[] = Html::a($model['name'],['view','id'=>$key]);
                    $actions[] = Html::a('编辑内容',['edit',
                        'id'=>$key,
                        'TaskItem[project_id]'=>$model['project_id'],
                        'TaskItem[project_version_id]'=>$model['project_version_id'],
                        'title'=>$model['name']],[
                        'class'=>'h6 text-muted',
                    ]);
                    $actions[] = Html::a('添加子项',
                        [
                            'create','pid'=>$key,
                            'TaskItem[project_id]'=>$model['project_id'],
                            'TaskItem[project_version_id]'=>$model['project_version_id'],
                            
                        ],[
                        'class'=>'h6 text-muted',
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-dailog',
                    ]);
                    return  implode(" ", $actions);
                }
            ],
            [
                'attribute' => 'id',
                'headerOptions'=>['width'=>'60px'],
                
            ],
            [
                'class' => '\app\components\ActionColumn',
                'headerOptions'=>['width'=>'80px'],
                'buttonsOptions'=>[
                    'update'=>[
                        'data-toggle'=>'modal',
                        'data-target'=>'#task-dailog',
                    ]
                ]
            ],
        ],
    ]); ?>
</div>
