<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TargetStatistics */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '指标统计', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-statistics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'target_id',
            'dimension_id',
            'scope',
        ],
    ]) ?>

</div>
