<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Team;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPlan */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '计划', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'team_id',
                'value'=>function($model){
                    if( $team = Team::find()->where(['id'=>$model['team_id']])->one() ) {
                        return $team->name;
                    }
                    return "";
                }
            ],
            'name',
            'target_date',
            'test_date',
            'prod_date',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

</div>
