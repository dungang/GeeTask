<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var */
$this->title = "日志项目";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project">
	<h1><?= Html::encode($this->title) ?></h1>
	    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'projectName',
            'description:ntext',
            'status',
            'region',
            'createTime:date',
            [
                'label'=>'日志库',
                'format'=>'raw',
                'value'=>function($model,$key,$index,$column){
                    return Html::a('查看',['/aliyun-log-store','projectName'=>$model['projectName']]);
                }
            ],
        ],
    ]); ?>
</div>