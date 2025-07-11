<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

interface DriverInterface
{
    public function getNext(string $key, int $startValue = 1, int $trial = 0, int $incr = 1): int;

    public function getNextAndPad(string $key, int $startValue = 1, int $trial = 0, int $incr = 1, string $padStr = '0', int $padLen = 4, int $padType = STR_PAD_LEFT): string;

}