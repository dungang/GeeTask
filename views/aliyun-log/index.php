<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var */
$this->title = "日志";
$projectName = \Yii::$app->request->get('projectName');
$logstoreName = \Yii::$app->request->get('logstore');
$this->params['breadcrumbs'][] = ['label' => '日志项目', 'url' => ['/aliyun-log-project/index']];
$this->params['breadcrumbs'][] = ['label' => $projectName, 'url' => ['/aliyun-log-store/index','projectName'=>$projectName]];
$this->params['breadcrumbs'][] = $logstoreName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project">
	<h1><?= Html::encode($this->title) ?></h1>
	    <?= GridView::widget([
        'dataProvider' => $dataProvider,
	        'columns' => [
	            [
	                'attribute'=>'time',
	                'format'=>'datetime',
	                'headerOptions'=>['width'=>'100px'],
	            ],
	            [
	                'attribute'=>'ip',
	                'headerOptions'=>['width'=>'100px'],
	            ],
	            [
	                'attribute'=>'level',
	                'headerOptions'=>['width'=>'40px'],
	            ],
                [
                    'attribute'=>'message',
                    'format'=>'html',
                    'contentOptions'=>['style'=>'word-break:break-all; word-wrap:break-all;'],
                    'value'=>function($model,$key,$index,$column){
                        $msgs[] = '<strong class="text-info">thread:</strong> ' . $model['thread'] .'';
                        $msgs[] = '<strong class="text-info">location:</strong> ' . $model['location'] . '';
                        $msgs[] = '<pre  style="width:850px;overflow-x:hidden;">' . $model['message'] . '</pre>';
                        return implode("<br/>", $msgs);
                    }
                ]
        ],
    ]); ?>
</div>