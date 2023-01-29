<?php


namespace shenyonghang\message;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Base
{
    protected $channel;
    public $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
        $connection = new AMQPStreamConnection($this->config['host'], $this->config['port'], $this->config['user'], $this->config['password'], $this->config['vhost']);
        $channel = $connection->channel();
        $this->channel = $channel;
    }

    public function getConfig()
    {
        $syhmessage = Config('syhmessage');
        if (file_exists($syhmessage['destination'])) {
            $config = array_merge(require($syhmessage['source']), require($syhmessage['destination']));
        } else {
            //默认配置
            $config = require($syhmessage['source']);
        }
        return $config;
    }
}