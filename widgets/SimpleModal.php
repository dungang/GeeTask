<?php
namespace app\widgets;

use yii\bootstrap\Modal;
use yii\bootstrap\Html;

class SimpleModal extends Modal
{
    public function run(){
        echo "\n" . $this->renderBodyEnd();
        echo "\n" . $this->renderFooter();
        echo "\n" . Html::endTag('div'); // modal-content
        echo "\n" . Html::endTag('div'); // modal-dialog
        echo "\n" . Html::endTag('div');
        $view = $this->getView();
        $view->registerJs("$('#".$this->options['id']."').on('hidden.bs.modal', function() { $(this).removeData('bs.modal')});");
    }
}

