<?php

namespace shenyonghang\message\genre;

use PhpAmqpLib\Message\AMQPMessage;
use shenyonghang\message\Base;

/**
 * 主题模式 - 路由匹配模式,选择性地接收消息（这个可以解决绝大多数场景）
 * design by 不然
 * date 2023/1/18
 * Class Topics
 */
class Topics extends Base
{
    public function push($msg, $routingKey = 'message.topic.default')
    {
        $msg = new AMQPMessage($msg);
//        $this->channel->exchange_declare('topic', 'topic',false, true, false, false);
        $this->channel->basic_publish($msg, 'br.topic', $routingKey);
    }
}