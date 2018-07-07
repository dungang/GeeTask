<?php
namespace app\widgets;

use yii\bootstrap\Widget;

class Kanban extends Widget
{
    public $viewFile;
    
    public $items;
    
    public $relationships;
    
    public function run(){
        return $this->render($this->viewFile);
    }
}

