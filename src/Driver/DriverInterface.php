<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

interface DriverInterface
{
    public function getNext(string $key, int $startValue = 1, int $trial = 0, int $incr = 1): int;

    public function getNextKey(string $key, string $joinStr = '', int $startValue = 1, int $trial = 0, int $incr = 1): string;

    public function getNextAndPad(string $key, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT, int $startValue = 1, int $trial = 0, int $incr = 1): string;

    public function getNextKeyAndPad(string $key, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT, string $joinStr = '', int $startValue = 1, int $trial = 0, int $incr = 1): string;
    
}