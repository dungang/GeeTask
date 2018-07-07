<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VirtualUser;

/* @var $this yii\web\View */
/* @var $models app\models\UserStory[] */
/* @var $model app\models\UserStory */
/* @var $form yii\widgets\ActiveForm */
$story_types = ['story'=>'故事(Story)','bug'=>'Bug(Bug)','spike'=>'探针(Spike)'];
$virturl_users = VirtualUser::allIdToName('id','name',['project_id'=>$queryParams['project_id']]);
?>

<div class="virtual-user-form">

    <?php $form = ActiveForm::begin(['id'=>'userstory-batch-form']); ?>
	<table class="table  table-bordered ">
		<tr>
			<th  width="140">类型</th>
			<th>为实现</th>
			<th>作为用户</th>
			<th>我需要</th>
			<th width="100">优先级</th>
			<th width="60">操作</th>
		</tr>
 	<?php foreach($models as $idx => $model):?>
		<tr>
			<td><?=$form->field($model, "[$idx]story_type")->dropDownList($story_types)->label(false)?></td>
			<td><?=$form->field($model, "[$idx]biz_value")->label(false)?></td>
			<td><?=$form->field($model, "[$idx]virtual_user_id")->dropDownList($virturl_users)->label(false)?></td>
			<td><?=$form->field($model, "[$idx]story")->label(false)?></td>
			<td><?=$form->field($model, "[$idx]priority")->label(false)?></td>
			<td><?= Html::a('删除','#',['class' => 'btn btn-danger']) ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<div class="form-group">
        <?= Html::a('添加一行','#',['class' => 'btn btn-warning']) ?>
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>