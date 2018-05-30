<?php
namespace app\components;

class AliyunLogProjectLogSearch extends AliyunLogDataSearch
{

    /**
     * 日志api请求的响应结果
     *
     * @var \Aliyun_Log_Models_GetLogsResponse
     */
    protected $response;
    
    public function init(){
        $this->key = '__time__';
    }
    
    public function search($param)
    {
        $request = new \Aliyun_Log_Models_GetProjectLogsRequest($param['projectName']);
        $this->response = $this->client->getProjectLogs($request);
    }
    
    public function getModels()
    {
        return $this->response->getProjects();
    }
    
    public function getCount()
    {
        return $this->response->getTotal();
    }
}

