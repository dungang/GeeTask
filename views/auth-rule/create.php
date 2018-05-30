<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthRule */

$this->title = '添加验证规则';
$this->params['breadcrumbs'][] = ['label' => '验证规则', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
