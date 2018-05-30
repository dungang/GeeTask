<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskDoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '任务日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-done-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'item_id',
            'status_code',
            'remark:ntext',
            'created_at:datetime',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
