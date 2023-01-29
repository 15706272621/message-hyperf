<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace shenyonghang\message;

use Hyperf\Amqp\Listener\BeforeMainServerStartListener;
use Hyperf\Amqp\Listener\MainWorkerStartListener;
use Hyperf\Amqp\Packer\Packer;
use Hyperf\Utils\Packer\JsonPacker;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'syhmessage' => [
                'id' => 'config',
                'description' => 'The config for amqp-diy.',
                'source' => __DIR__ . '/../publish/config.php',
                'destination' => BASE_PATH . '/config/autoload/syhmessage.php',
            ],
        ];
    }
}
