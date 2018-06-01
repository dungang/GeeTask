<?php
namespace app\widgets;

use yii\bootstrap\Widget;

class ToolTips extends Widget
{
    public function run(){
        $this->registerPlugin("tooltip");
    }
}

