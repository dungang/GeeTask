<?php
namespace app\widgets;

use yii\bootstrap\Widget;
use app\assets\BootstrapContextMenuAsset;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Html;

class BootstrapContextMenu extends Widget
{
    public $items = [];
    
    public function run(){
        BootstrapContextMenuAsset::register($this->view);
        $this->registerPlugin('contextmenu');
        return Html::tag('div',Dropdown::widget(['items'=>$items]),['id'=>$this->clientOptions['target']]);
    }
}

