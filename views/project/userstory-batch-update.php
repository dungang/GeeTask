<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $models app\models\UserStory[] */
/* @var $model app\models\UserStory */

$this->title = '批量更新 UserStory ';
$this->params['breadcrumbs'][] = ['label' => '新鲜故事', 'url' => ['fresh-story']];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
		<strong><?= Html::encode($this->title) ?></strong>
</div>
<div class="modal-body">
    <?= $this->render('userstory-batch-form', [
        'models' => $models,
        'queryParams'=>$queryParams
    ]) ?>

</div>