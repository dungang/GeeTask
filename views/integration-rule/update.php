<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRule */

$this->title = '更新积分规则: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '积分规则', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="integration-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider'=>$dataProvider,
    ]) ?>

</div>
