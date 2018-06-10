<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel \app\aliyunlog\models\Query */
$this->title = "日志";
$projectName = $searchModel->projectName;
$logstoreName = $searchModel->logstoreName;
$this->params['breadcrumbs'][] = ['label' => '日志项目', 'url' => ['/aliyun-log-project/index']];
$this->params['breadcrumbs'][] = ['label' => $projectName, 'url' => ['/aliyun-log-store/index','projectName'=>$projectName]];
$this->params['breadcrumbs'][] = $logstoreName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project">
	<h1><?= Html::encode($this->title) ?></h1>
	<?php $form = ActiveForm::begin([
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class='row'>
    	<div class='col-md-2'>
    		<?= $form->field($searchModel, 'from')->input('datetime') ?>
    	</div>
    	<div class='col-md-2'>
    		<?= $form->field($searchModel, 'to')->input('datetime') ?>
    	</div>
    	<div class='col-md-3'>
    		<div class='col-md-6'>
        		<?= $form->field($searchModel, 'line') ?>
        	</div>
        	<div class='col-md-6'>
        		<?= $form->field($searchModel, 'offset') ?>
        	</div>
    	</div>
    	<div class='col-md-2'>
    		<?= $form->field($searchModel, 'query') ?>
    	</div>
    	<div class='col-md-2'>
    		<?= $form->field($searchModel, 'reverse')->dropDownList([0=>'false',1=>'true']) ?>
    	</div>
    	<div class='col-md-1'>
    		<label>&nbsp;</label>
    		<div class="form-group">
    		<?= Html::submitButton('查询', ['class' => 'btn btn-primary btn-small']) ?>
    		</div>
    	</div>
    </div>
    <?php ActiveForm::end(); ?>
	    <?= GridView::widget([
        'dataProvider' => $dataProvider,
	        'columns' => [
	            [
	                'attribute'=>'time',
	                'format'=>'datetime',
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
                        $msgs[] = '<strong class="text-info">ip:</strong> ' . $model['ip'] .'';
                        $msgs[] = '<strong class="text-info">thread:</strong> ' . $model['thread'] .'';
                        $msgs[] = '<strong class="text-info">location:</strong> ' . $model['location'] . '';
                        $msgs[] = '<pre  style="width:950px;overflow-x:hidden;">' . $model['message'] . '</pre>';
                        return implode("<br/>", $msgs);
                    }
                ]
        ],
    ]); ?>
</div>