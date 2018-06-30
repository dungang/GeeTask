<?php 

use yii\widgets\DetailView;

?>
<?=DetailView::widget([
    'model' => $source,
	    'attributes' => [
	        [
	            'attribute'=>'task_type_code',
	            'label'=>'来源',
	            'captionOptions' => ['width'=>'100px'],
	            'value'=> isset($task_types[$source['task_type_code']]) ? $task_types[$source['task_type_code']]:$source['task_type_code']
	        ],
	        'id',
            [
                'attribute'=>'name',
                'captionOptions' => ['width'=>'100px']
            ],
    ]])?>