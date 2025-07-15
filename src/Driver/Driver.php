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
            return $this->getNextCounter($key, $startValue, $incr);
        } catch (\Throwable $throwable) {
            // 重试
            if ($trial < 3) {
                return $this->getNext($key, $startValue, $trial + 1, $incr); //try again
            }
            throw $throwable;
        }
    }

    public function getNextAndPad(string $key, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT, int $startValue = 1, int $trial = 0, int $incr = 1): string
    {
        $nextVal = $this->getNext($key, $startValue, $trial, $incr);
        return str_pad(strval($nextVal), $padLen, $padStr, $padType);
    }

    public function getNextKey(string $key, string $joinStr = '', int $startValue = 1, int $trial = 0, int $incr = 1): string
    {
        return implode($joinStr, [
            $key,
            $this->getNext($key, $startValue, $trial, $incr),
        ]);
    }

    public function getNextKeyAndPad(string $key, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT, string $joinStr = '', int $startValue = 1, int $trial = 0, int $incr = 1): string
    {
        return implode($joinStr, [
            $key,
            $this->getNextAndPad($key, $padStr, $padLen, $padType, $startValue, $trial, $incr),
        ]);
    }
    
    abstract protected function getNextCounter(string $key, int $startValue = 1, int $incr = 1): int;
}