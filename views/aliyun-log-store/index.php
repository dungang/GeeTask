<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\aliyunlog\models\LogStore */
$this->title = "日志库";
$this->params['breadcrumbs'][] = ['label' => '日志项目', 'url' => ['/aliyun-log-project/index']];
$this->params['breadcrumbs'][] = \Yii::$app->request->get('projectName');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logstore">
	<h1><?= Html::encode($this->title) ?></h1>
	    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'logstoreName',
            [
                'label'=>'日志库日志',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                return Html::a('查看',['/aliyun-log','projectName'=>$model['projectName'],'logstore'=>$model['logstoreName']]);
                }
            ],
            [
                'label'=>'项目日志',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                return Html::a('查看',['/aliyun-log/project-log','projectName'=>$model['projectName'],'logstore'=>$model['logstoreName']]);
                }
            ],
        ],
    ]); ?>
</div>