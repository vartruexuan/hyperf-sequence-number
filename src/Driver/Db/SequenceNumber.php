<?php

declare(strict_types=1);

namespace Vartruexuan\HyperfSequenceNumber\Driver\Db;

use Hyperf\Database\Model\Model;

class SequenceNumber extends Model
{
    public ?string $table = 'sequence_number';
}