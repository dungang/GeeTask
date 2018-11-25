<?php
namespace app\controllers;

class ToolsController extends BaseController
{
    
    private $driverConfig = [
        'class'=>'dungang\storage\driver\AliyunOSS',
        'accessKey'=>'LTAI0uwtOYMmZcrf',
        'accessSecret'=>'7do2U8f2P6LR4WcxgextQbg8covFuR',
        'endpoint'=>'http://oss-cn-shenzhen.aliyuncs.com',
        'bucket'=>'nda-booking',
        'imageBaseUrl'=>'http://nda-booking.oss-cn-shenzhen.aliyuncs.com',
        'fileBaseUrl'=>'http://nda-booking.oss-cn-shenzhen.aliyuncs.com',
        'dirSuffix'=> 'test',
    ];
    
    public function init() {
        $this->userActions = ['ueditor','upload-image','upload-file','delete'];
    }
    
    public function actions()
    {
        return [
            'ueditor' => [
                'class' => 'dungang\ueditor\actions\UEditorAction',
                'driverConfig'=>$this->driverConfig,
                
            ],
            'upload-init' => [
                'class' => 'dungang\webuploader\actions\InitAction',
                'driverConfig'=>$this->driverConfig,
                'accept' => ['gif','jpg','png']
            ],
            'upload-image' => [
                'class' => 'dungang\webuploader\actions\UploadAction',
                'driverConfig'=>$this->driverConfig,
                'accept' => ['gif','jpg','png']
            ],
            'upload-file' => [
                'class' => 'dungang\webuploader\actions\UploadAction',
                'driverConfig'=>$this->driverConfig,
                'accept' => ['gif','jpg','png']
            ],
            'delete' => [
                'class' => 'dungang\webuploader\actions\DelAction',
                'driverConfig'=>$this->driverConfig,
                
            ]
        ];
    }
}

