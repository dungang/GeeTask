<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\JobPosition;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegrationRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分规则';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integration-rule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加积分规则', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'method',
            'route',
            'created_at:date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
