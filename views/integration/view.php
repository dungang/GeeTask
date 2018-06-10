<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Integration */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '积分记录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'reciever_id',
            'creator_id',
            'rule_id',
            'expirence_scope',
            'contribution_scope',
            'route',
            'name',
            'target',
            'target_id',
            'remark',
            'created_at:datetime',
        ],
    ]) ?>

</div>
