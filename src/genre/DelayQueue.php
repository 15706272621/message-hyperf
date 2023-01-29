<?php


namespace shenyonghang\message\genre;

use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;
use shenyonghang\message\Base;

/**
 * 延时队列
 * design by 不然
 * date 2023/1/28
 * Class DelayQueue
 */
class DelayQueue extends Base
{
    public function push($msg, $ttl = 0, $exchange = 'br.delayed.default', $routingKey = '')
    {

//        $this->channel->exchange_declare('delayed_exchange', 'x-delayed-message',false, true, false, false,false,
//        new AMQPTable([
//            'x-delayed-type'=>AMQPExchangeType::FANOUT
//        ]));
        $delayConfig = [];
        if ($ttl) {
            $delayConfig = [
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
                'application_headers' => new AMQPTable(['x-delay' => $ttl * 1000])
            ];
        }
        $msg = new AMQPMessage($msg, $delayConfig);

        $this->channel->basic_publish($msg, $exchange, $routingKey);
    }
}