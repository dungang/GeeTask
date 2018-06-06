<?php
namespace app\aliyunlog\models;

use app\aliyunlog\components\DataSearch;

class LogStoreSearch extends DataSearch
{
    /**
     * 日志api请求的响应结果
     *
     * @var \Aliyun_Log_Models_ListLogstoresResponse
     */
    protected $response;
    
    private $projectName;
    
    public function init(){
        $this->key = 'logstoreName';
    }
    
    public function search($param)
    {
        $request = new \Aliyun_Log_Models_ListLogstoresRequest($param['projectName']);
        $this->response = $this->client->listLogstores($request);
        $this->projectName = $param['projectName'];
    }
    
    public function getModels()
    {
        return array_map(function($item){
            return new LogStore(['logstoreName'=>$item,'projectName'=>$this->projectName]);
        }, $this->response->getLogstores());
    }
    
    public function getCount()
    {
        return $this->response->getCount();
    }

    
}

