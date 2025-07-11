<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

interface DriverInterface
{
    public function getNext(string $key, int $startValue = 1, int $trial = 0, int $incr = 1);
}