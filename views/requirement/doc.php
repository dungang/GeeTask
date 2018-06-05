<?php

use yii\helpers\Html;
use app\widgets\TreeGrid;
use app\models\RequirementVersion;
use app\models\Project;
use app\widgets\SimpleModal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label'=>'项目需求文档',
    'url'=>['index']
];

if(($projectName = \Yii::$app->request->get('project_name')) && ($version = \Yii::$app->request->get('version'))) {
    $this->title = $projectName . ' ' . $version;
} else {
    $version = RequirementVersion::findOne(['id'=>$searchModel->version_id]);
    $project = Project::findOne(['id'=>$searchModel->project_id]);
    $this->title = $project->name . ' ' . $version->name;
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加需求文档', ['create','pid'=>'0','project_id'=>$searchModel->project_id,'version_id'=>$searchModel->version_id], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#requirement-dailog',
        ]) ?>
    </p>

    <?= TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName'=>'id',
        'parentColumnName'=>'pid',
        'columns' => [
            [
                'attribute'=>'title',
                'label'=>'目录',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    $actions = [];
                    $actions[] = Html::a($model['title'],['view','id'=>$key]);
                    $actions[] = Html::a('编辑内容',['/requirement-content/create',
                        'requirement_id'=>$key,
                        'project_id'=>$model['project_id'],
                        'version_id'=>$model['version_id'],
                        'title'=>$model['title']],[
                        'class'=>'h6 text-muted',
                    ]);
                    $actions[] = Html::a('添加子项',['create','pid'=>$key,'project_id'=>$model['project_id'],'version_id'=>$model['version_id']],[
                        'class'=>'h6 text-muted',
                        'data-toggle'=>'modal',
                        'data-target'=>'#requirement-dailog',
                    ]);
                    return  implode(" ", $actions);
                }
            ],
            [
                'attribute' => 'id',
                'headerOptions'=>['width'=>'60px'],
                
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions'=>['width'=>'80px'],
                
            ],
        ],
    ]); ?>
    
    <?php 
    SimpleModal::begin([
        'header'=>'需求文档',
        'options'=>['id'=>'requirement-dailog']
    ]);
    echo "没有记录";
    SimpleModal::end();
    ?>
</div>
