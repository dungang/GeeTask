<?php
namespace app\widgets;

use yii\bootstrap\Widget;
use app\assets\AppAsset;

class LongPoll extends Widget
{
    public function run(){
        AppAsset::register($this->view);
        $this->registerPlugin('longpoll');
    }
}

