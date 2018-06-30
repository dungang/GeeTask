<?php
namespace app\widgets;

use yii\base\Widget;
use app\assets\AppAsset;

class LinkageSelect extends Widget
{
    public function run(){
        AppAsset::register($this->view);
        $this->view->registerJs("$(document).linkageSelect()");
    }
}

