<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\TaskPlan;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TaskContent;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\TaskItem */
$planName = '无';
$plan = TaskPlan::findOne([
    'id' => $model->plan_id
]);

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => '任务计划',
    'url' => [
        '/task-item',
        'TaskItemSearch[plan_id]' => $model->plan_id
    ]
];
$this->params['breadcrumbs'][] = $this->title;

//所有用户
$users = User::allIdToName('id','nick_name');

?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
    <?= Html::encode($this->title) ?>
</div>
<div class="modal-body">
    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'name',
                'captionOptions' => ['width'=>'100px']
            ],
            'id',
            [
                'attribute'=>'user_id',
                'value' => $users[$model->user_id]
            ],
            [
                'attribute' => 'plan_id',
                'value' => $plan == null ? $planName : $plan->name
                
            ],
            'status_code',
            'code',
            'target_date',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label'=>'内容',
                'format'=>'html',
                'value'=>$content->content
            ],
        ]])?>
        <h3>修改历史</h3>
        <?= GridView::widget([
            'dataProvider' => new ActiveDataProvider([
                //'query'=>TaskContent::find()->where(['AND',['item_id'=>$model->id],['<>','id',$content->id]])->orderBy('created_at desc'),
                'query'=>TaskContent::find()->where(['item_id'=>$model->id]),
                'pagination'=>false,
            ]),
            'columns' => [
                'created_at:datetime',
                [
                    'attribute'=>'user_id',
                    'value'=>function($model) use($users) {
                    return $users[$model['user_id']];
                    }
                ],
                [
                    'attribute'=>'creator_id',
                    'value'=>function($model) use($users) {
                        return $users[$model['creator_id']];
                    }
                ],
                [
                    'format'=>'raw',
                    'value'=>function($model,$key,$index,$column){
                        return Html::a('查看',['/task-item/history-content','id'=>$model->id],[
                            'data-toggle'=>'modal',
                            'data-target'=>'#task-dailog',
                        ]);
                    }
                ],
            ],
        ]); ?>
</div>
