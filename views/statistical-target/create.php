<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatisticalTarget */

$this->title = '添加统计对象';
$this->params['breadcrumbs'][] = ['label' => '统计对象', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistical-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
