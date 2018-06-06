<?php
namespace app\aliyunlog\models;

use yii\base\Model;

class Log extends Model
{
    public $time;
    
    public $topic;
    
    public $ip;
    
    public $level;
    
    public $location;
    
    public $message;
    
    public $thread;
    
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'topic'=>'主题',
            'time' => '时间',
            'ip' => 'IP',
            'level' => 'LEVEL',
            'location' => '异常位置',
            'message' => '消息',
            'thread' => '线程',
        ];
    }
}

