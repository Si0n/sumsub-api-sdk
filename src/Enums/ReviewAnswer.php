<?php

declare(strict_types=1);

namespace SumsubApi\Enums;

enum ReviewAnswer: string
{
    case GREEN = 'GREEN';
    case RED = 'RED';

    public function isOk(): bool
    {
        return self::GREEN === $this;
    }
}
