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
namespace Vartruexuan\HyperfSequenceNumber;

use Vartruexuan\HyperfSequenceNumber\Driver\DriverInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                DriverInterface::class => SequenceNumberInvoker::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for sequence number.',
                    'source' => __DIR__ . '/../publish/sequence_number.php',
                    'destination' => BASE_PATH . '/config/autoload/sequence_number.php',
                ],
            ],
        ];
    }
}
