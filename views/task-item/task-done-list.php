<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\User;
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	任务更新状态记录
</div>
<div class="modal-body">
<?php
$users = User::allIdToName('id', 'nick_name');
Pjax::begin([
    'enablePushState' => false // 不修改地址
]);
?>
<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'created_at',
            'format'=>'datetime',
            'headerOptions' => ['width'=>'160px'],
        ],
        [
            'attribute' => 'user_id',
            'headerOptions' => ['width'=>'60px'],
            'filter' => $users,
            'value' => function ($model, $key, $index, $column) {
                return $column->filter[$model['user_id']];
            }
        ],
        [
            'attribute' => 'creator_id',
            'headerOptions' => ['width'=>'60px'],
            'filter' => $users,
            'value' => function ($model, $key, $index, $column) {
                return $column->filter[$model['creator_id']];
            }
        ],
        [
            'attribute' => 'status_code',
            'headerOptions' => ['width'=>'60px'],
            'filter' => $taskStatuses,
            'value' => function ($model, $key, $index, $column) {
            return isset($column->filter[$model['status_code']])?$column->filter[$model['status_code']]:$model['status_code'];
            }
        ],
        'remark:ntext'
    ]
]);
?>
<?php Pjax::end(); ?>
</div>