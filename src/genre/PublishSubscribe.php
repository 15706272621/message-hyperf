<?php

namespace shenyonghang\message\genre;

use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;
use shenyonghang\message\Base;

/**
 * 订阅模式 | 一个消息多个消费场景。
 * design by 不然
 * date 2023/1/18
 * Class PublishSubscribe
 */
class PublishSubscribe extends Base
{
    public function push($msg)
    {
        $msg = new AMQPMessage($msg);
        $this->channel->basic_publish($msg, 'br.fanout');
    }
}