<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            [
                'attribute'=>'experience_value',
                'headerOptions'=>['width'=>'60px']
            ],
            [
                'attribute'=>'contribution_value',
                'headerOptions'=>['width'=>'60px']
            ],
            [
                'attribute'=>'repeat_times',
                'headerOptions'=>['width'=>'60px']
            ],
            'created_at:date',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
