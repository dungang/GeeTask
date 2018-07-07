<?php
namespace app\components;

use yii\web\Response;
use yii\base\InvalidConfigException;

class LongPollResponse extends Response
{

    /**
     * 业务处理句柄，不同业务使用不同的句柄实现类
     *
     * @var ILongPollHandler
     */
    public $handler;

    public $timeout = 25;

    public $sleepTime = 6;

    /**
     * Prepares for sending the response.
     *
     * @throws InvalidConfigException
     */
    protected function prepare()
    {      
        \Yii::$app->getSession()->close();
    }

    /**
     * Sends the response content to the client.
     */
    protected function sendContent()
    {
        set_time_limit(0);
        ignore_user_abort(true);
        $endTime = time() + $this->timeout;

        if (! YII_ENV_TEST) {
            $this->clearOutputBuffers();
        }
        do {
            \Yii::$app->db->close();
            sleep($this->sleepTime);
            \Yii::$app->db->open();
            flush();//No new orders, flush to notify php still alive
            if ($data = $this->handler->process()) {
                echo $data;
                flush();
                break;
            }
        } while (time() < $endTime);
    }
}

