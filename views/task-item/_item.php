<?php 
use yii\widgets\DetailView;

?>
<?=DetailView::widget([
    'model' => $model,
	    'attributes' => [
	        [
	            'attribute'=>'task_type_code',
	            'captionOptions' => ['width'=>'100px'],
	            'value'=> isset($task_types[$model['task_type_code']]) ? $task_types[$model['task_type_code']]:$model['task_type_code']
	        ],
	        [
	            'attribute'=>'name',
	        ],
            'id',
            [
                'attribute'=>'user_id',
                'value' => $users[$model->user_id]
            ],
            [
                'attribute' => 'plan_id',
                'value' => $plan == null ? '无' : $plan->name
                
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