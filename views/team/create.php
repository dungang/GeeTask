<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = '添加团队';
$this->params['breadcrumbs'][] = ['label' => '团队', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
