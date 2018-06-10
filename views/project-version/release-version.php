<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProjectVersion;
use app\widgets\SimpleModal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目发布版本';
$this->params['breadcrumbs'][] = $this->title;
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
                'value'=>function($model,$key,$index,$column){
                    if($versions = ProjectVersion::findAllReleaseVerions(['project_id'=>$model['id']])){
                        return implode(" ", array_map(function($version)use($model){
                            return $version['name'];
                        }, $versions));
                    }
                    return '';
                }
            ],
            'created_at:date',
            [
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column) {
                return Html::a('添加版本',['/project-version/create-release-version','project_id'=>$model['id']],[
                    'data-toggle'=>'modal',
                    'data-target'=>'#project-version-dailog',
                ]);
                }
           ]
        ],
    ]); ?>
</div>

<?php
SimpleModal::begin([
    //'size'=>'modal-sm',
    'header'=>'任务更新状态记录',
    'options'=>['id'=>'project-version-dailog']
]);
echo "没有记录";
SimpleModal::end();
?>
