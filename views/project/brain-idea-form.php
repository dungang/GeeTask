<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Idea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="idea-form">

    <?php $form = ActiveForm::begin(['id'=>'idea-form']); ?>
    <?= $form->field($model, 'content')->textarea(['maxlength' => true])->hint("最多输入128个字符，请按照模板格式输入：为实现<商业价值>，作为<角色用户>，我需要<功能>。") ?>
	<?= $form->field($model, 'color')->radioList(['#ffc'=>'黄色','#cfc'=>'绿色','#ccf'=>'蓝色']) ?>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
