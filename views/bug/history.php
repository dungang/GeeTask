<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\RequirementContent */
$this->title = '历史内容';
//所有用户
$users = User::allIdToName('id','nick_name');
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>

    <?= Html::encode($this->title) ?>
    
    </div>
<div class="modal-body">
	<p>
	<?=Html::a('返回',['view','id'=>$model['item_id']],
                        [
                            'class'=>'btn btn-sm btn-success',
                            'data-pajx'=>'0',
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-dailog'
                        ])?>
	</p>
    <?=DetailView::widget(['model' => $model,'attributes' => [
        [
            'attribute'=>'created_at',
            'format'=>'datetime',
            'captionOptions'=>['width'=>'80px;'],
        ],
        'status_code',
        [
            'attribute'=>'user_id',
            'value'=>function($model) use ($users){
                return $users[$model['user_id']];
            }
        ],
        [
            'attribute'=>'creator_id',
            'value'=>function($model) use ($users){
            return $users[$model['user_id']];
            }
        ],
        'content:html',
    ]])?>

</div>