<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IntegrationRule */

$this->title = '添加积分规则';
$this->params['breadcrumbs'][] = ['label' => '积分规则', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integration-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
