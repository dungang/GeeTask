<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JobPosition */

$this->title = '添加工作岗位';
$this->params['breadcrumbs'][] = ['label' => '工作岗位', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
