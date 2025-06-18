<?php

declare(strict_types=1);

namespace SumsubApi\DTO;

interface BaseEntityPart
{
    public static function fromArray(array $data): static;
}
