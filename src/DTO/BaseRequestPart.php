<?php

declare(strict_types=1);

namespace SumsubApi\DTO;

interface BaseRequestPart
{
    public function toArray(): array;
}
