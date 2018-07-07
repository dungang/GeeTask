<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $models app\models\UserStory[] */

$this->title = '批量添加 User Story ';
$this->params['breadcrumbs'][] = ['label' => '新鲜故事', 'url' => ['/project/fresh-story']];
$this->params['breadcrumbs'][] = $this->title;
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