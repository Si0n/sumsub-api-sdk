<?php

declare(strict_types=1);

namespace SumsubApi\DTO;

interface BaseRequest
{
    public function toGuzzleOptions(): array;
}
