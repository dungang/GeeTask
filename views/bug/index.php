<?php

use yii\helpers\Html;
use app\models\Project;
use app\widgets\SimpleModal;
use yii\grid\GridView;
use app\models\User;
use app\components\StatusDataColumn;
use app\models\BugStatus;
use app\models\ProjectVersion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = [
    'label'=>'项目BUG',
    'url'=>['project']
];

if(($projectName = \Yii::$app->request->get('project_name')) && ($version = \Yii::$app->request->get('version'))) {
    $this->title = $projectName . ' ' . $version;
} else {
    $version = ProjectVersion::findOne(['id'=>$searchModel->version_id]);
    $project = Project::findOne(['id'=>$searchModel->project_id]);
    $this->title = $project->name . ' ' . $version->name;
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加BUG', ['create','pid'=>'0','project_id'=>$searchModel->project_id,'version_id'=>$searchModel->version_id], [
            'class' => 'btn btn-success',
            'data-toggle'=>'modal',
            'data-target'=>'#bug-dailog',
        ]) ?>
    </p>
<?php 
$users = User::allIdToName('id','nick_name');
$tableWidth = 1140;
$codeWidth = 65;
$userWidth = 60;
$titleWidth= 260;
$dateWidth = 150;
$actionWidth = 80;
$statusWidth = $tableWidth - $codeWidth - $userWidth - $titleWidth - $dateWidth - $actionWidth;
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'id',
                'headerOptions'=>['width'=>$codeWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$codeWidth . 'px','class'=>'text-center'],
            ],
            [
                'attribute'=>'user_id',
                'headerOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$userWidth . 'px','class'=>'text-center'],
                'format'=>'raw',
                'value' => function($model,$key,$index,$column)use($users){
                    return $users[$model['user_id']];
                }
            ],
            [
                'attribute'=>'title',
                'label'=>'BUG',
                'format'=>'raw',
                'headerOptions'=>['width'=>$titleWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$titleWidth . 'px','class'=>'text-center'],
                'value'=>function($model,$key,$index,$column){
                    $actions = [];
                    $actions[] = Html::a($model['title'],['view','id'=>$key]);
                    $actions[] = Html::a('编辑内容',['/bug-content/create',
                        'bug_id'=>$key,
                        'project_id'=>$model['project_id'],
                        'version_id'=>$model['version_id'],
                        'title'=>$model['title']],[
                        'class'=>'h6 text-muted',
                    ]);
                    return  implode(" ", $actions);
                }
            ],
            [
                'class'=>StatusDataColumn::className(),
                'width'=>$statusWidth,
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions'=>['class'=>'text-center'],
                'attribute'=>'status_code',
                'allStatus'=>BugStatus::allIdToName('code'),
                'value'=>function($model,$key,$index,$column){
                return Html::a('<span class="glyphicon glyphicon-ok text-success"></span>',
                    ['/bug-content-done/create',
                        'BugContentDone[status_code]'=>$model['status_code'],
                        'bug_id'=>$model['id'],
                        'title'=>$model['title']
                        
                    ],
                    [
                        'data-pajx'=>'0','title'=>'请添加操作日志',
                        'data-toggle'=>'modal',
                        'data-target'=>'#bug-dailog'
                    ]);
                }
            ],
            [
                'attribute'=>'created_at',
                'format'=>'datetime',
                'headerOptions'=>['width'=>$dateWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$dateWidth . 'px','class'=>'text-center'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions'=>['width'=>$actionWidth . 'px','class'=>'text-center'],
                'contentOptions'=>['width'=>$actionWidth . 'px','class'=>'text-center'],
            ],
        ],
    ]); ?>
    
    <?php 
    SimpleModal::begin([
        'header'=>'BUG文档',
        'options'=>['id'=>'bug-dailog']
    ]);
    echo "没有记录";
    SimpleModal::end();
    ?>
</div>
