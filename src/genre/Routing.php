<?php

namespace shenyonghang\message\genre;

use PhpAmqpLib\Message\AMQPMessage;
use shenyonghang\message\Base;

/**
 * 路由模式-选择性地接收消息（这个可以解决绝大多数场景）
 * design by 不然
 * date 2023/1/18
 * Class Routing
 */
class Routing extends Base
{
    public function push($msg, $routingKey = 'message.routing.default')
    {
        $msg = new AMQPMessage($msg);
        $this->channel->basic_publish($msg, 'br.routing', $routingKey);
    }
}