<?php
namespace app\widgets;

use yii\base\Widget;
use app\assets\DragulaAsset;
use yii\helpers\Json;

class Dragula extends Widget
{
    /**
     * 容器selector列表
     * @var array
     */
    public $containers;
    
    /**
     * dragula选项
     * @var array
     */
    public $clientOptions= [];
    
    public function run(){
        DragulaAsset::register($this->view);
        $containers = implode("'),document.querySelector('", $this->containers);
        $js = "dragula([document.querySelector('".$containers."')],".Json::htmlEncode($this->clientOptions).");";
        $this->view->registerJs($js);
    }
}

