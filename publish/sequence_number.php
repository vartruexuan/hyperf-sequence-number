<?php

declare(strict_types=1);

return [
    'default' => 'db',
    'drivers' => [
        // db驱动
        'db' => [
            'driver' => \Vartruexuan\HyperfSequenceNumber\Driver\DbDriver::class,
            // 设置编码计次model
            'model' => \Vartruexuan\HyperfSequenceNumber\Driver\Db\SequenceNumber::class,
        ]
    ],
];
