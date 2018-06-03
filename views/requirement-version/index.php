<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Project;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequirementVersionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目需求版本';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-version-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加版本', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'project_id',
                'filter'=>Project::allIdToName(),
                'value'=>function($model,$key,$index,$column){
                    return $column->filter[$model['project_id']];
                }
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
