<?php
namespace app\controllers;

class ToolsController extends BaseController
{
    public function init() {
        $this->userActions = ['ueditor','upload-image','upload-file','delete'];
    }
    
    public function actions()
    {
        return [
            'ueditor' => [
                'class' => 'dungang\ueditor\actions\UEditorAction'
            ],
            'upload-image' => [
                'class' => 'dungang\webuploader\actions\UploadAction',
                'accept' => ['gif','jpg','png']
            ],
            'upload-file' => [
                'class' => 'dungang\webuploader\actions\UploadAction',
                'accept' => ['gif','jpg','png']
            ],
            'delete' => [
                'class' => 'dungang\webuploader\actions\DelAction'
            ]
        ];
    }
}

