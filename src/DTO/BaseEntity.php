<?php

declare(strict_types=1);

namespace SumsubApi\DTO;

use GuzzleHttp\Psr7\Response;

interface BaseEntity
{
    public static function fromResponse(Response $response): static;
}
