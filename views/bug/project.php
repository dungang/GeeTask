<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProjectVersion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目BUG';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            [
                'label'=>'项目发布版本',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    if($versions = ProjectVersion::findAllReleaseVerions(['project_id'=>$model['id']])){
                        return implode(" ", array_map(function($version)use($model){
                            return Html::a($version['name'],['index',
                                'TaskItemSearch[project_version_id]'=>$version['id'],
                                'TaskItemSearch[project_id]'=>$version['project_id'],
                                'project_name'=>$model['name'],
                                'version'=>$version['name']
                            ]);
                        }, $versions));
                    }
                    return '';
                }
            ],
            'created_at:date',
        ],
    ]); ?>
</div>
