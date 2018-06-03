<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RequirementVersion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目需求文档';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            [
                'label'=>'文档版本',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    if($versions = RequirementVersion::findAll(['project_id'=>$model['id']])){
                        return implode(" ", array_map(function($version)use($model){
                            return Html::a($version['name'],['doc',
                                'RequirementSearch[version_id]'=>$version['id'],
                                'RequirementSearch[project_id]'=>$version['project_id'],
                                'project_name'=>$model['name'],
                                'version'=>$version['name']
                            ]);
                        }, $versions));
                    }
                    return '';
                }
            ],
            'created_at:date',
            [
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) {
                    return Html::a('添加版本',['/requirement-version/create','project_id'=>$model['id'], 'title'=>$model['name']]);
                }
            ]
        ],
    ]); ?>
</div>
