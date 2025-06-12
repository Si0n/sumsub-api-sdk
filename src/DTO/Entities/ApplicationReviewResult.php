<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use SumsubApi\DTO\BaseEntity;

class ApplicationReviewResult implements BaseEntity
{
    public function __construct(
        public ?string $moderationComment = null,
        public ?string $clientComment = null,
        public ?string $reviewAnswer = null,
        public ?array $rejectLabels = null,
        public ?string $reviewRejectType = null,
        public ?array $buttonIds = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            moderationComment: $data['moderationComment'] ?? null,
            clientComment: $data['clientComment'] ?? null,
            reviewAnswer: $data['reviewAnswer'] ?? null,
            rejectLabels: $data['rejectLabels'] ?? null,
            reviewRejectType: $data['reviewRejectType'] ?? null,
            buttonIds: $data['buttonIds'] ?? null,
            rawData: $data,
        );
    }
}
