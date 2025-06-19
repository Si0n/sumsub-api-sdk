<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;

class RejectionReason implements BaseEntity
{
    public function __construct(
        public ?array $imagesStates = null,
        public ?array $applicantState = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return new static(
            imagesStates: $data['imagesStates'] ?? null,
            applicantState: $data['applicantState'] ?? null,
            rawData: $data,
        );
    }
}
