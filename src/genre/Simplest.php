<?php
namespace shenyonghang\message\genre;

use PhpAmqpLib\Message\AMQPMessage;
use shenyonghang\message\Base;
/**
 * 单通道模式-基本用不上
 * design by 不然
 * date 2023/1/18
 * Class Simplest
 */
class Simplest extends Base
{
    public function push($msg){
        $msg = new AMQPMessage($msg);
        $this->channel->queue_declare('hello', false, true, false, false);
        $this->channel->basic_publish($msg, '', 'hello');
    }
}