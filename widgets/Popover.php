<?php
namespace app\widgets;

use yii\bootstrap\Widget;

class Popover  extends Widget
{
    public function run(){
        $this->registerPlugin("popover");
    }
}

