<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;

class AccessToken implements BaseEntity
{
    public function __construct(
        public ?string $token = null,
        public ?string $userId = null,
        public array $rawData = [],
    ) {
    }

    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return new static(
            token: $data['token'] ?? null,
            userId: $data['userId'] ?? null,
            rawData: $data,
        );
    }
}
