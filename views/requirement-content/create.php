<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RequirementContent */

$this->title = 'Create Requirement Content';
$this->params['breadcrumbs'][] = ['label' => 'Requirement Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
