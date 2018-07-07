<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Release;
use app\models\Sprint;

/* @var $this yii\web\View */
/* @var $model app\models\Sprint */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord) {
    $model->sequence = Sprint::getNewSequence($model->project_id);
}
?>

<div class="sprint-form">

    <?php $form = ActiveForm::begin(['id'=>'sprint-form']); ?>

    <?= $form->field($model, 'sequence')->textInput() ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'release_id')->dropDownList(Release::allIdToName()) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
