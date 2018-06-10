<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BugStatus */

$this->title = 'Create Bug Status';
$this->params['breadcrumbs'][] = ['label' => 'Bug Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
