<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Sprint;

/* @var $this yii\web\View */
/* @var $models app\models\UserStory[] */
/* @var $model app\models\UserStory */
/* @var $form yii\widgets\ActiveForm */
/* @var $queryParams array */

$story_types = [
    'story' => '故事(Story)',
    'bug' => 'Bug(Bug)',
    'spike' => '探针(Spike)'
];
$virturl_users = VirtualUser::allIdToName('id', 'name', [
    'project_id' => $queryParams['project_id']
]);

$sprints = Sprint::allIdToName('id','sequence',[
    'project_id' => $queryParams['project_id']
]);
?>

<div id="virtual-user-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'userstory-batch-form'
    ]);
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => 'table', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 10, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item',
        'formId' => 'userstory-batch-form',
        'model' => $models[0],
        'formFields' => [
            'story_type',
            'biz_value',
            'virtual_user_id',
            'story',
            'sprint_id',
            'category',
            'priority'
        ]
    ])?>
	<table class="table  table-bordered ">
		<tr>
			<th width="140">类型</th>
			<th>为实现</th>
			<th>作为用户</th>
			<th>我需要</th>
			<th>冲刺期</th>
			<th>分类</th>
			<th width="100">优先级</th>
			<th width="60"><button type="button"
					class="add-item btn btn-success btn-xs">
					<i class="glyphicon glyphicon-plus"></i>
				</button></th>
		</tr>
 	<?php foreach($models as $idx => $model):?>
		<tr class="item">
			<td><?=$form->field($model, "[$idx]story_type")->dropDownList($story_types)->label(false)?></td>
			<td><?=$form->field($model, "[$idx]biz_value")->label(false)?></td>
			<td><?=$form->field($model, "[$idx]virtual_user_id")->dropDownList($virturl_users)->label(false)?></td>
			<td><?=$form->field($model, "[$idx]story")->label(false)?></td>
			<td><?=$form->field($model, "[$idx]sprint_id")->dropDownList($sprints)->label(false)?></td>
			<td><?=$form->field($model, "[$idx]category")->dropDownList(['NoPlan'=>'NoPlan','ProductBacklog'=>'ProductBacklog','SprintBacklog'=>'SprintBacklog'])->label(false)?></td>
			<td><?=$form->field($model, "[$idx]priority")->label(false)?></td>
			<td><button type="button" class="remove-item btn btn-danger btn-xs">
					<i class="glyphicon glyphicon-minus"></i>
				</button></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
    <?php
    DynamicFormWidget::end();
    ActiveForm::end();
    ?>

</div>