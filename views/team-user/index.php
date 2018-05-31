<?php
use yii\helpers\Html;
use app\models\User;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '团队成员';
$this->params['breadcrumbs'][] = [
    'label' => '团队',
    'url' => [
        '/team'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $team->name,
    'url' => [
        '/team',
        'id' => $team->id
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-user-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(); ?>
		<?= Html::hiddenInput('team_id',$team->id)?>
		<div class="panel panel-default">
			<div class="panel-body">
    		<?php foreach ($users = User::findAll(['status'=>User::STATUS_ACTIVE]) as $user) :?>
    		<?= Html::checkbox('user_id[]',in_array($user->id,$staff_ids),['value'=>$user->id]) ?>
    		<?= $user->nick_name ?>
    		<?php endforeach;?>
    	</div>
		</div>
		<div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
	<?php ActiveForm::end(); ?>
</div>
