<?php
namespace app\controllers;

/**
 * 阿里云日志服务api的base controller
 * @author dungang
 *
 */
abstract class AliyunLogBaseController extends BaseController
{
    /**
     * 获取阿里云的 log 客户端
     * @return \Aliyun_Log_Client
     */
    public function getLogClient(){
        $endpoint = \Yii::$app->params['aliyunLog']['endpoint'];
        $accessKey = \Yii::$app->params['aliyunLog']['accessKey'];
        $secretKey = \Yii::$app->params['aliyunLog']['secretKey'];
        return new \Aliyun_Log_Client($endpoint, $accessKey, $secretKey);
    }
}

