<?php
namespace app\components;

/**
 * Comet 处理接口
 * @author dungang
 *
 */
interface ILongPollHandler
{
    /**
     * 返回json字符串 或者 false（表示终止服务连接）
     * @return  string | boolean
     */
    public function process();
}

