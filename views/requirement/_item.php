<?php 
use yii\widgets\DetailView;
use app\models\Project;
use app\models\ProjectVersion;

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
    	        [
    	            'attribute'=>'project_id',
    	            'value'=>function($model){
        	            if(empty($model['project_id'])) return '';
        	            $project = Project::findOne(['id'=>$model['project_id']]);
        	            return $project->name;
    	            }
	            ],
	            [
	                'attribute'=>'project_version_id',
	                'value'=>function($model){
    	                if(empty($model['project_version_id'])) return '';
    	                $project_version = ProjectVersion::findOne(['id'=>$model['project_version_id']]);
    	                return $project_version->name;
	                }
	            ],
                [
                    'attribute'=>'status_code',
                    'value'=>empty($taskStatuses[$model['status_code']])?'':$taskStatuses[$model['status_code']]
                ],
                'created_at:datetime',
                'updated_at:datetime',
    ]])?>