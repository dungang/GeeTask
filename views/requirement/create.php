<?php
use yii\helpers\Html;
use app\models\RequirementVersion;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = '添加需求文档';

$version = RequirementVersion::findOne([
    'id' => $model->version_id
]);
$project = Project::findOne([
    'id' => $model->project_id
]);
$this->params['breadcrumbs'][] = [
    'label' => '项目需求文档',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $project->name . $version->name,
    'url' => [
        'doc',
        'RequirementSearch[project_id]' => $model->project_id,
        'RequirementSearch[version_id]' => $model->version_id
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>

    <?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?=$this->render('_form', ['model' => $model])?>

</div>
