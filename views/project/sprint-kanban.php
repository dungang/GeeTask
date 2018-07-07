<?php
use yii\helpers\Html;
use app\models\Project;
use app\widgets\Dragula;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Sprint */

$project = Project::findOne($model->project_id);
$this->title = $project->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprint-index">

	<h1>Project <?= Html::encode($this->title) ?> <small>Sprint#<?=$model->sequence ?> Kanban</small>
	</h1>
	<div class="row">
		<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$project])?>
	</div>
		<div class="col-md-10">

			<table class="table ">
				<tr>
					<th class="text-center" width="33.33%"><div class="story-status">todo</div></th>
					<th class="text-center" width="33.33%"><div class="story-status">doing</div></th>
					<th class="text-center" width="33.33%"><div class="story-status">done</div></th>
				</tr>
				<tr>
					<td id="todo">
						<div class="story-card"><a href="#">#1221</a><br/>测试测试测试测试测试测试测试测试测试测试</div>
						<div class="story-card">#1221<br/>测试</div>
						<div class="story-card">#1221<br/>测试</div>
					</td>
					<td id="doing">
						<div class="story-card">#1221<br/>测试</div>
						<div class="story-card">#1221<br/>测试</div>
						<div class="story-card">#1221<br/>测试</div>
					</td>
					<td id="done">
						<div class="story-card">#1221<br/>测试</div>
						<div class="story-card">#1221<br/>测试</div>
						<div class="story-card">#1221<br/>测试</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php Dragula::widget([
    'containers'=>['#todo','#doing','#done']
])?>
