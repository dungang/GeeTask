<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthPermission */

$this->title = '添加权限';
$this->params['breadcrumbs'][] = ['label' => '权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-permission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
