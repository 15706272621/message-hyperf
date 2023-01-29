<?php

namespace shenyonghang\message;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class JPush
{

   public function send(){
       $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest','message');
       $channel = $connection->channel();
       $channel->queue_declare('hello', false, true, false, false);
       $msg = new AMQPMessage(123);
       $channel->basic_publish($msg, '', 'hello');
   }

}