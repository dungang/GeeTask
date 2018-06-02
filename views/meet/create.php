<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Meet */

$this->title = '添加会议';
$this->params['breadcrumbs'][] = ['label' => '会议', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
