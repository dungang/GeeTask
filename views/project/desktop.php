<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Projects',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Project <?= Html::encode($this->title) ?> <small>Desktop</small></h1>
<div class="row">
	<div class="col-md-2">
		<?= $this->render('desktop-menu',['project'=>$model])?>
	</div>
	<div class="col-md-10">
	<?php

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'intro:ntext',
        'created_at:datetime',
        'updated_at:datetime',
        'is_achived',
        'is_del'
    ]
])?>
	
	</div>
</div>


