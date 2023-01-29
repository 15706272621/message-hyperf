<?php

namespace shenyonghang\message\tool;

use shenyonghang\message\genre\DelayQueue;
use shenyonghang\message\genre\PublishSubscribe;
use shenyonghang\message\genre\Routing;
use shenyonghang\message\genre\Simplest;
use shenyonghang\message\genre\Topics;
use shenyonghang\message\genre\WorkQueues;

/**
 * Bug 公众号信息提示
 * design by 不然
 * date 2023/1/28
 * Class Debug
 */
class Debug
{
    protected $amqp;

    public function __construct(PublishSubscribe $amqp)
    {
        $this->amqp = $amqp;
    }

    public function push($data)
    {
        $this->amqp->push(json_encode(array_merge($data, [
            'headers' => [
                'time'=>date('Y/m/d H:i:s'),
                'key' => $this->amqp->config['tool']['debug']['key']
            ]
        ]), JSON_UNESCAPED_UNICODE));
    }

    public function info($msg, $data = [])
    {
        $this->push([
            'type' => 'info', 'msg' => $msg, 'data' => $data
        ]);
    }

    public function warn($msg, $data = [])
    {
        $this->push([
            'type' => 'warn', 'msg' => $msg, 'data' => $data
        ]);
    }

    public function danger($msg, $data = [])
    {
        $this->push([
            'type' => 'danger', 'msg' => $msg, 'data' => $data
        ]);
    }
}