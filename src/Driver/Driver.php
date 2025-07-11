<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

abstract class Driver implements DriverInterface
{
    public EventDispatcherInterface $event;


    public function __construct(protected ContainerInterface $container, protected array $config, protected string $name)
    {
        $this->event = $container->get(EventDispatcherInterface::class);
    }

    public function getNext(string $key, int $startValue = 1000, int $trial = 0, int $incr = 1)
    {
        return $this->getNextCounter( $key, $startValue,  $trial , $incr);
    }

    abstract protected function getNextCounter(string $key, int $startValue = 1000, int $trial = 0,int $incr = 1);
}