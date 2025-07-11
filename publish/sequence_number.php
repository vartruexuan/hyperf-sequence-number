<?php

declare(strict_types=1);

return [
    'default' => 'db',
    'drivers' => [
        'db' => [
            'driver' => \Vartruexuan\HyperfSequenceNumber\Driver\DbDriver::class,
            'model' => \Vartruexuan\HyperfSequenceNumber\Driver\Db\SequenceNumber::class,
        ]
    ],
];
