<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver;

use Hyperf\Database\Model\Model;
use Psr\Container\ContainerInterface;
use Vartruexuan\HyperfSequenceNumber\Driver\Db\SequenceNumber;

class DbDriver extends Driver
{
    /**
     * @var Model|string
     */
    public string $model;

    public function __construct(ContainerInterface $container, array $config, string $name)
    {
        parent::__construct($container, $config, $name);
        $this->model = $this->config['model'] ?? SequenceNumber::class;
    }

    protected function getNextCounter(string $key, int $startValue = 1, int $trial = 0, int $incr = 1)
    {
        return $this->model::query()->getConnection()->transaction(function () use ($key, $startValue, $incr, $trial) {

            $currentNumber = $this->model::query()->lockForUpdate()->where('key', $key)->pluck('counter');

            if ($currentNumber <= 0) {
                $this->model::query()->insert(['key' => $key, 'counter' => $startValue]);
                $nextVal = $startValue;
            } else {
                $nextVal = $currentNumber + $incr;
                $this->model::query()->where('key', $key)->update(['counter' => $nextVal]);
            }
            return $nextVal;
        });
    }
}