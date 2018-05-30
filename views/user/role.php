<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\TreeGrid;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = '用户: ' . $model->nick_name;
$this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nick_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '分配角色';
?>
<div class="auth-role-permissions">

    <h1><?= Html::encode($this->title) ?></h1>
	 <?php $form = ActiveForm::begin(); ?>
        <?= TreeGrid::widget([
            'dataProvider' => $dataProvider,
            'keyColumnName'=>'name',
            'parentColumnName'=>'parent',
            'columns' => [
                [
                    'attribute'=>'name',
                    'label'=>'名称',
                    'format'=>'raw',
                    'value'=>function($model,$key,$index,$column)use($rights){
                            $checkbox = Html::checkbox('role[]', in_array($model['name'],$rights),['value'=>$model['name']]);
                            return $checkbox . $model['name'];
                    }
                ],
                [
                    'attribute'=>'description',
                    'label'=>'描述',
                    'format'=>'ntext',
                ],
            ],
            
        ]); ?>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
