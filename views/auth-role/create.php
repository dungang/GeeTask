<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthRole */

$this->title = '添加角色';
$this->params['breadcrumbs'][] = ['label' => '角色', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
