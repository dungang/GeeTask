<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskDone */

$this->title = '添加任务日志';
$this->params['breadcrumbs'][] = [
    'label' => '任务计划',
    'url' => [
        '/task-item',
        'TaskItemSearch[plan_id]' => $model->plan_id
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-8">
		<div class="task-done-index">

			<h1><?= Html::encode(Yii::$app->request->get('title') . ' - 日志') ?></h1>
                <?=$this->render('_list', ['dataProvider' => $dataProvider,'searchModel' => $searchModel])?>
        </div>
	</div>
	<div class="col-md-4">

		<div class="task-done-create">

			<h1><?= Html::encode($this->title) ?></h1>
        
            <?=$this->render('_form', ['model' => $model])?>
        
        </div>
	</div>
</div>
