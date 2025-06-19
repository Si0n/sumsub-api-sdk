<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities\Parts;

use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\Enums\RejectionLabel;
use SumsubApi\Enums\ReviewAnswer;
use SumsubApi\Enums\ReviewRejectType;

class ReviewResult implements BaseEntityPart
{
    public function __construct(
        public ?ReviewAnswer $reviewAnswer = null,
        public ?array $rejectLabels = null,
        public ?string $reviewRejectType = null,
        public ?string $clientComment = null,
        public ?string $moderationComment = null,
        public ?array $buttonIds = null,
        public array $rawData = [],
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            reviewAnswer: ReviewAnswer::tryFrom($data['reviewAnswer'] ?? null),
            rejectLabels: array_map(RejectionLabel::tryFrom(...), $data['rejectLabels'] ?? []),
            reviewRejectType: ReviewRejectType::tryFrom($data['reviewRejectType'] ?? null),
            clientComment: $data['clientComment'] ?? null,
            moderationComment: $data['moderationComment'] ?? null,
            buttonIds: $data['buttonIds'] ?? null,
            rawData: $data,
        );
    }
}
