<?php
namespace app\actions;


class ViewAction extends BaseAction
{
    public function run($id) {
        return $this->controller->render($this->id, [
            'model' => $this->findModel($id),
        ]);
    }
   
}

