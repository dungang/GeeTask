<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\JobPosition;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegrationRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '积分细则';
$this->params['breadcrumbs'][] = $this->title;
$jobPositions = JobPosition::allIdToName();
?>
<div class="integration-rule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'job_position',
                'headerOptions'=>['width'=>'160px'],
                'value'=>function($model,$key,$index,$column)use($jobPositions) {
                return $jobPositions[$model['job_position']];
                }
            ],
            'name',
            [
                'attribute'=>'experience_value',
                'label'=>'经验',
                'headerOptions'=>['width'=>'60px']
            ],
            [
                'attribute'=>'contribution_value',
                'label'=>'贡献',
                'headerOptions'=>['width'=>'60px']
            ],
            [
                'attribute'=>'repeat_times',
                'label'=>'重复次数',
                'headerOptions'=>['width'=>'60px']
            ],
            'method',
            'route',
        ],
    ]); ?>
</div>
