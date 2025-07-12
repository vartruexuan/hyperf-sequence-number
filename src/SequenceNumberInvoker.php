<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Vartruexuan\HyperfSequenceNumber\Driver\DriverFactory;

class SequenceNumberInvoker
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $name = $config->get('sequence_number.default', 'db');
        $factory = $container->get(DriverFactory::class);
        return $factory->get($name);
    }
}