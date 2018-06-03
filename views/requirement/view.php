<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RequirementVersion;
use app\models\Project;
use app\models\RequirementContent;
use app\models\User;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\widgets\SimpleModal;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = $model->title;
//版本
$version = RequirementVersion::findOne(['id'=>$model->version_id]);
//项目
$project = Project::findOne(['id'=>$model->project_id]);
//作者
$author = User::findOne(['id'=>$model->user_id]);

//面包削
$this->params['breadcrumbs'][] = ['label' => '项目需求文档', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $project->name . $version->name, 'url' => ['doc',
    'RequirementSearch[project_id]'=>$model->project_id,
    'RequirementSearch[version_id]'=>$model->version_id
]];$this->params['breadcrumbs'][] = $this->title;

?>
<div class="requirement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'template'=>'<tr><th{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
        'attributes' => [
            [
                'attribute'=>'title',
                'captionOptions'=>['width'=>'120px']
            ],
            [
                'attribute'=>'project_id',
                'value'=>$project->name,
            ],
            [
                'attribute'=>'version_id',
                'value'=>$version->name,
            ],
            [
                'attribute'=>'user_id',
                'value'=>$author->nick_name,
            ],
            'created_at:datetime',
            [
                'attribute'=>'updated_at',
                'format'=>'datetime',
                'value'=>$content->created_at,
            ],
        ],
    ]) ?>
    
    <div>
    	<?php echo $content->content;?>
    </div>

	<div>
	<h3>修改历史</h3>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query'=>RequirementContent::find()->where(['AND',['requirement_id'=>$model->id],['<>','id',$content->id]]),
            //'query'=>RequirementContent::find()->where(['requirement_id'=>$model->id]),
            'pagination'=>false,
        ]),
        'columns' => [
            'created_at:datetime',
            [
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    return Html::a('查看',['/requirement-content/view','id'=>$model->id],[
                        'data-toggle'=>'modal',
                        'data-target'=>'#requirement-dailog',
                    ]);
                }
            ],
        ],
    ]); ?>
	</div>
	
	    <?php 
    SimpleModal::begin([
        'size'=>'modal-lg',
        'header'=>'需求文档',
        'options'=>['id'=>'requirement-dailog']
    ]);
    echo "没有记录";
    SimpleModal::end();
    ?>
</div>
