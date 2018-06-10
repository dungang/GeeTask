<?php

use yii\helpers\Html;
use app\models\RequirementVersion;
use app\models\Project;


/* @var $this yii\web\View */
/* @var $model app\models\RequirementContent */

$this->title = '编辑BUG';
$project_id = \Yii::$app->request->get('project_id');
$version_id = \Yii::$app->request->get('version_id');
$version = RequirementVersion::findOne(['id'=>$version_id]);
$project = Project::findOne(['id'=>$project_id]);
$this->params['breadcrumbs'][] = ['label' => '项目BUG', 'url' => ['/bug/project']];
$this->params['breadcrumbs'][] = ['label' => $project->name . $version->name, 'url' => ['/bug/index',
    'RequirementSearch[project_id]'=>$project_id,
    'RequirementSearch[version_id]'=>$version_id,
    ]];
$this->params['breadcrumbs'][] = ['label' => \Yii::$app->request->get('title'), 'url' => ['/bug/view','id'=>$model->requirement_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
