<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Project;
use app\models\Idea;
use app\models\Team;
use app\widgets\Toggle;
use yii\web\JsExpression;
use yii\helpers\Url;
use app\widgets\LongPoll;
use app\widgets\JqueryContextMenu;

/* @var $this yii\web\View */
/* @var $model app\models\BrainStorm */

$project = Project::findOne($model->project_id);

$this->title = $model->theme;
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'project/index'
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $project->name,
    'url' => [
        'project/desktop',
        'id' => $project->id
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Brain Storms',
    'url' => [
        'brain-storm',
        'BrainStormSearch[project_id]'=>$project->id
    ]
];
$this->params['breadcrumbs'][] = $this->title;

$ideas = Idea::findAll([
    'brain_storm_id' => $model->id
]);
$authors = Team::allIdToName();
$isClosed = $model->status == 'close';
?>

<h1>
	<?= Html::encode($this->title) ?> 
	<small><span
		class="label <?= $isClosed ? 'label-default':'label-warning' ?>"><?=$model->status ?></span></small>
	<?php if($isClosed == false) {?>
	<span class="btn-group pull-right" role="group">
		<button id='toggle-btn' class="btn btn-primary">Show</button> 
	<?=Html::a('关闭', ['brain-storm-close','id' => $model->id], ['class' => 'btn btn-danger','data' => ['confirm' => '确定接受此次头脑风暴?','method' => 'post','params' => ['BrainStorm[status]' => 'close']]])?>
        </span>
        <?php } ?>
</h1>

<div class="modal-body note-wall <?= $isClosed ? '':'note-hide' ?>">
	<ul id="idea-box">
		<?php foreach($ideas as $idea) { ?>
		<li class='note' id='<?=$idea->id?>'
			data-conv-url='<?=Url::to(['brain-idea-convert','id'=>$idea->id]) ?>'
			data-del-url='<?=Url::to(['brain-idea-delete','id'=>$idea->id]) ?>'>
			<div style="background-color: <?=$idea->color ?>">
				<strong><?= $authors[$idea->creator_id]?></strong>
				<h3>#<?= $idea->id ?> <?=$idea->convert_type ?> </h3>
				<p><?= $idea->content?></p>
			</div>
		</li>
		<?php }?>
	</ul>
</div>

<?php
if ($model->status == 'open') {
    Toggle::widget([
        'selector' => 'toggle-btn',
        'targetSelector' => '.note-wall'
    ]);
    $delete_url = Url::to([
        'brain-idea-delete'
    ]);
    JqueryContextMenu::widget([
        'selector' => '.note',
        'items' => [
            'delete' => [
                'name' => '删除',
                'icon' => 'delete',
                'callback' => new JsExpression("function(key, opt){
                var note = opt.\$trigger;
                $.ajax({
                    method:'POST',
                    url:note.attr('data-del-url'),
                    dataType:'json',
                    contentType:'application/json; charset=UTF-8',
                    success:function(response){
                        note.fadeOut('slow',function(){note.remove()});
                    }
                });
            }")
            ],
            'story' => [
                'name' => '转为故事(Story)',
                'icon' => 'copy'
            ],
            'feature' => [
                'name' => '转为功能(Feature)',
                'icon' => 'copy'
            ],
            'epic' => [
                'name' => '转为活动(Epic)',
                'icon' => 'copy'
            ]
        ],
        
        'callback' => new JsExpression("function(key, opt){
        if(key != 'delete'){
            var note = opt.\$trigger;
            $.ajax({
                method:'POST',
                url:note.attr('data-conv-url'),
                data:{'Idea[convert_type]':key},
                dataType:'json',
                contentType:'application/json; charset=UTF-8',
                success:function(response){
                    if(response.code == '200') {
                        var data = response.data;
                        note.find('h3').text('#'+data.id + ' ' + data.convert_type);
                    }
                }
            });
        }
            
    }")
    
    ]);
    LongPoll::widget([
        'id' => 'idea-box',
        'clientOptions' => [
            'timestamp' => time(),
            'dataType' => 'json',
            'url' => Url::to([
                'brain-idea-fetch',
                'brain_storm_id' => $model->id
            ]),
            'onSuccess' => new JsExpression("function(data){
            this.data('timestamp',data.timestamp);
            for(var i in data.items){
                var item = data.items[i];
                this.append('<li class=\'note\'><div style=\'background-color:'+item.color+'\'><h3>#'+item.id+' ' + item.author + '</h3><p>'+item.content+'</p></div></li>');
            }
        }")
        ]
    ]);
}

?>
