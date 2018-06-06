<?php
namespace app\aliyunlog\models;

use app\aliyunlog\components\DataSearch;

class LogSearch extends DataSearch
{

    /**
     * 日志api请求的响应结果
     *
     * @var \Aliyun_Log_Models_GetLogsResponse
     */
    protected $response;

    public function init()
    {
        $this->key = 'time';
    }

    public function search($param)
    {
        if (empty($param['starttime']) or empty($param['endtime'])) {
            $today = date('Y-m-d 00:00:00');
            $param['starttime'] = $today;
            $param['endtime'] = date('Y-m-d 00:00:00', strtotime($today . " -1   day"));
        }
        if (empty($param['size'])) {
            $param['size'] = 20;
        }
        if (empty($param['page'])) {
            $param['page'] = 1;
        }
        
        $offset = $param['size'] * ($param['page'] - 1);
        $request = new \Aliyun_Log_Models_GetLogsRequest(
            $param['projectName'], 
            $param['logstore'],
            strtotime($param['starttime']), 
            strtotime($param['endtime']),
            isset($param['topic'])?$param['topic']:null,
            null,
            $param['size'],
            $offset,
            isset($param['reverse'])?$param['reverse']:null);
        $this->response = $this->client->getLogs($request);
    }

    public function getModels()
    {
        return array_map(function ($item) {
            $content = $item->getContents();
            return new Log([
                'time' => $item->getTime(),
                'ip' => $item->getSource(),
                'level' => $content['level'],
                'location' => $content['location'],
                'thread' => $content['thread'],
                'topic' => $content['__topic__'],
                'message' => $content['message']
            ]);
        }, $this->response->getLogs());
    }

    public function getCount()
    {
        return $this->response->getCount();
    }
}

