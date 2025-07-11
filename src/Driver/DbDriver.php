<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

class DbDriver extends Driver
{
    protected function getNextCounter(string $key, int $startValue = 1000, int $trial = 0, int $incr = 1)
    {
        // TODO: Implement getNextCounter() method.
    }
}