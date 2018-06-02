<?php
namespace app\components;

use yii\base\BaseObject;
use yii\httpclient\Client;
use yii\httpclient\Request;

/**
 * 钉钉机器人
 *
 * @author dungang
 *        
 */
class DingTalkRobot extends BaseObject
{

    public $webook;

    /**
     * 消息标题
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string|array
     */
    public $msg;

    /**
     * 图片地址
     *
     * @var string
     */
    public $picUrl = "";

    /**
     * 消息文档地址
     *
     * @var string
     */
    public $messageUrl = "";

    /**
     *
     * @var string
     */
    public $msg_type = 'text';

    /**
     *
     * @var boolean|array
     */
    public $atMobiles = false;

    /**
     *
     * @var boolean
     */
    public $isAll = false;

    /**
     * 请求对象
     *
     * @var Request
     */
    private $_request;

    /**
     *
     * {@inheritdoc}
     * @see \yii\base\BaseObject::__construct()
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
        
        $this->_request = (new Client())->createRequest();
        
        $this->sendMessage($this->msg, $this->msg_type, $this->atMobiles, $this->isAll);
    }

    /**
     * 文本消息
     *
     * @return string[]|string[][]|array[][]|boolean[][]
     */
    public function textMsg()
    {
        return [
            'msgtype' => $this->msg_type,
            $this->msg_type => [
                'content' => $this->msg
            ],
            'at' => [
                'atMobiles' => $this->atMobiles,
                'isAll' => $this->isAll
            ]
        ];
    }

    public function markdownMsg()
    {
        return [
            'msgtype' => $this->msg_type,
            $this->msg_type => [
                'title'=>$this->title,
                'text' => '### ' . $this->title . "\n\n" . $this->msg
            ],
            'at' => [
                'atMobiles' => $this->atMobiles,
                'isAll' => $this->isAll
            ]
        ];
    }

    public function linkMsg()
    {
        return [
            'msgtype' => $this->msg_type,
            $this->msg_type => [
                'title' => $this->title,
                'text' => $this->msg,
                'picUrl' => $this->picUrl,
                'messageUrl' => $this->messageUrl
            ],
            'at' => [
                'atMobiles' => $this->atMobiles,
                'isAll' => $this->isAll
            ]
        ];
    }

    /**
     * 发送消息
     *
     * @param string $msg
     * @param string $msg_type
     * @param boolean|array $atMobiles
     * @param boolean $isAll
     */
    public function sendMessage()
    {
        $fullMsg = false;
        if ($this->msg_type == 'text') {
            $fullMsg = $this->textMsg();
        } else if ($this->msg_type == 'markdown') {
            $fullMsg = $this->markdownMsg();
        } else if ($this->msg_type == 'link') {
            $fullMsg = $this->linkMsg();
        }
        if ($fullMsg) {
            
            $response = $this->_request->setUrl($this->webook)
                ->addHeaders([
                'content-type' => 'application/json'
            ])
                ->setContent(json_encode($fullMsg))
                ->setMethod('post')
                ->send();
        }
    }
}

