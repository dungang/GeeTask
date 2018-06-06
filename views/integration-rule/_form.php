<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integration-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-6">
        	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
            <?= $form->field($model, 'method')->dropDownList([ 'POST' => 'POST', 'GET' => 'GET', ]) ?>
        
            <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-6">
            <?= $form->field($model, 'experience_value')->textInput() ?>
        
            <?= $form->field($model, 'contribution_value')->textInput() ?>
        
            <?= $form->field($model, 'repeat_times')->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5]) ?>
    	</div>
    </div>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
