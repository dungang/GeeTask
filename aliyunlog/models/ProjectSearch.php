<?php
namespace app\aliyunlog\models;


use app\aliyunlog\components\DataSearch;

class ProjectSearch extends DataSearch
{

    /**
     * 日志api请求的响应结果
     *
     * @var \Aliyun_Log_Models_ListProjectResponse
     */
    protected $response;
    
    public function init(){
        $this->key = 'projectName';
    }

    public function search($param)
    {
        $request = new \Aliyun_Log_Models_ListProjectRequest();
        $this->response = $this->client->listProject($request);
    }

    public function getModels()
    {
        return array_map(function($item){
            return new Project($item);
            }, $this->response->getProjects());
    }

    public function getCount()
    {
        return $this->response->getTotal();
    }
}

