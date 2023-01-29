<?php
namespace shenyonghang\message\genre;

use PhpAmqpLib\Message\AMQPMessage;
use shenyonghang\message\Base;

/**
 * 工作流模式-在工人之间分配任务
 * design by 不然
 * date 2023/1/18
 * Class WorkQueues
 */
class WorkQueues extends Base
{

    public function push($msg){
        $msg = new AMQPMessage($msg,array('delivery_mode'=>AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $this->channel->queue_declare('hello', false, true, false, false);
        $this->channel->basic_publish($msg, '', 'hello');
    }
}