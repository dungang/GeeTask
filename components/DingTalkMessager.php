<?php
namespace app\components;

use yii\httpclient\Client;
use yii\httpclient\Response;

class DingTalkMessager 
{
    public $endpoint = 'https://oapi.dingtalk.com/';
    
    public $corpId = 'dingedd064063daf480d35c2f4657eb6378f';
    
    public $corpSecret = 'z2CoWvxCE6PFaEMUoX6xRLvzlNPqPRnQmw0jNx_zQ6jSTX0eUaz1EHiZW403Qrll';
    
    private $_access_token;
    
    private $_http_client;

    public function __construct() {
        $this->$_http_client = (new Client(['baseUrl' => $this->endpoint]));
        $this->initAccessToken();
    }
    
    public function initAccessToken(){
        if($this->_access_token = \Yii::$app->cache->get('dingtalk-accesstoken')){
            $this->_access_token = $this->requestAaccessToken();
            \Yii::$app->cache->set('dingtalk-accesstoken',$this->_access_token,7200);
        }
    }
    
    /**
     * 处理请求的结果
     * @param Response $response
     */
    private function getResponseData($response){
        $errorMsg = "ding服务错误";
        if($response->isOk) {
            $data = $response->data;
            if($data['errcode'] == 0) {
                return $data;
            }
            $errorMsg = $data['errmsg'];
        }
        throw new \ErrorException($errorMsg);
    }
    
    
    public function requestAaccessToken(){
        /* @var Response $response */
        if($response = $this->_http_client->get('gettoken',['corpid'=>$this->corpId,'corpsecret'=>$this->corpSecret])){
            $data = $this->getResponseData($response);
            return $data['access_token'];
        }
        throw new \ErrorException("获取token失败：".$response->statusCode);
    }
    
    /**
     * 获取部门列表
     * @return mixed
     */
    public function getDepartments(){
        return $this->getData("department/list");
    }
    
    /**
     * 获取部门的员工
     * @param number $department_id
     * @param number $offset
     * @param number $size
     * @return mixed
     */
    public function getUsersOfDepartment($department_id,$offset=0,$size=100){
        return $this->getData('user/list',['department_id'=>$department_id]);
    }
    
    /**
     * 获取数据的统一方法
     * @param string $api
     * @param array $param
     * @throws \ErrorException
     * @return mixed
     */
    public function getData($api,$param=[]){
        $params['access_token'] = $this->_access_token;
        /* @var Response $response */
        if($response = $this->_http_client->get($api,$params)){
            return $this->getResponseData($response);
        }
        throw new \ErrorException("获取token失败：".$response->statusCode);
    }
    
}

