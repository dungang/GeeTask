<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AcRoute */

$this->title = '添加路由';
$this->params['breadcrumbs'][] = ['label' => '系统路由', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ac-route-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
