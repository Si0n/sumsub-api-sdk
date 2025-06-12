<?php

declare(strict_types=1);

namespace SumsubApi\DTO;

interface BaseEntity
{
    public static function fromArray(array $data): static;
}
