<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use SumsubApi\DTO\BaseEntity;

class AccessToken implements BaseEntity
{
    public function __construct(
        public ?string $token = null,
        public ?string $userId = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            token: $data['token'] ?? null,
            userId: $data['userId'] ?? null,
        );
    }
}
