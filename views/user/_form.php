<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\JobPosition;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-6">
        	<?= $form->field($model, 'username')->textInput() ?>
            <?= $form->field($model, 'nick_name')->textInput() ?>
            <?= $form->field($model, 'job_position')->dropDownList(JobPosition::allIdToName()) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
    	</div>
    	<div class="col-md-6">
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'mobile')->textInput() ?>
            <?= $form->field($model, 'status')->dropDownList([
                0=>'未激活',
                10=>'已激活'
            ]) ?>
    	</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
