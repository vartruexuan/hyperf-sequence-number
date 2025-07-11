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

    public function getNext(string $key, int $startValue = 1, int $trial = 0, int $incr = 1): int
    {
        try {
            return $this->getNextCounter($key, $startValue, $trial, $incr);
        } catch (\Throwable $throwable) {
            // 重试
            if ($trial < 3) {
                return $this->getNextCounter($key, $startValue, $trial + 1); //try again
            }
        }
    }

    public function getNextAndPad(string $key, int $startValue = 1, int $trial = 0, int $incr = 1, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT): string
    {
        $nextVal = $this->getNext($key, $startValue, $trial, $incr);
        return str_pad(strval($nextVal), $padLen, $padStr, $padType);
    }

    abstract protected function getNextCounter(string $key, int $startValue = 1, int $incr = 1): int;
}