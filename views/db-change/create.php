<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DbChange */

$this->title = '添加数据库变更';
$this->params['breadcrumbs'][] = ['label' => '数据库变更', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-change-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
