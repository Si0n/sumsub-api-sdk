<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;

class ExternalWebSDKLink implements BaseEntity
{
    public function __construct(
        public ?string $url = null,
    ) {
    }

    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return new static(
            url: $data['url'] ?? null,
        );
    }
}
