<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\JobPosition;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRule */
/* @var $form yii\widgets\ActiveForm */
$jobPositions = JobPosition::allIdToName();
?>

<div class="integration-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
		<div class="col-md-4">
        	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    	</div>
		<div class="col-md-4">
            <?= $form->field($model, 'method')->dropDownList([ 'POST' => 'POST', 'GET' => 'GET', ]) ?>
    	</div>
		<div class="col-md-4">
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-12">
    	<?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>
    	<?= GridView::widget([
    	    'dataProvider'=>$dataProvider,
    	    'layout'=>'{items}',
    	    'columns'=>[
    	        [
    	            'attribute'=>'job_position',
    	            'value'=>function($model,$key,$index,$column) use($jobPositions) {
    	               return $jobPositions[$model['job_position']];
    	            }
    	        ],
    	        [
    	            'attribute'=>'experience_value',
    	            'format'=>'raw',
    	            'value'=>function($model,$key,$index,$column) use($form) {
    	                return $form->field($model,"[$key]experience_value")->label(FALSE);
    	            }
	            ],
	            [
	                'attribute'=>'contribution_value',
	                'format'=>'raw',
	                'value'=>function($model,$key,$index,$column) use($form) {
	                   return $form->field($model,"[$key]contribution_value")->textInput()->label(FALSE);
	                }
	            ],
	            [
	                'attribute'=>'repeat_times',
	                'format'=>'raw',
	                'value'=>function($model,$key,$index,$column) use($form) {
    	                return $form->field($model,"[$key]repeat_times")->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5])->label(FALSE);
    	                }
	            ],
    	    ]
    	]);?>
    	</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
