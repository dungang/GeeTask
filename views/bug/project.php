<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProjectVersion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目BUG';
$this->params['breadcrumbs'][] = $this->title;
$versionLimit = 5; //每个项目的最多显示最近的5个版本
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            [
                'label'=>'发布版本',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) use ($versionLimit) {
                if($versions = ProjectVersion::findAllReleaseVerions(['project_id'=>$model['id']],$versionLimit)){
                        return implode(" ", array_map(function($version)use($model){
                            return Html::a($version['name'],['index',
                                'BugSearch[version_id]'=>$version['id'],
                                'BugSearch[project_id]'=>$version['project_id'],
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
