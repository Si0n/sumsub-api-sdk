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
        public ?ReviewRejectType $reviewRejectType = null,
        public ?string $clientComment = null,
        public ?string $moderationComment = null,
        public ?array $buttonIds = null,
        public array $rawData = [],
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            reviewAnswer: !empty($data['reviewAnswer']) ? ReviewAnswer::tryFrom($data['reviewAnswer']) : null,
            rejectLabels: array_map(RejectionLabel::tryFrom(...), $data['rejectLabels'] ?? []),
            reviewRejectType: !empty($data['reviewRejectType']) ? ReviewRejectType::tryFrom($data['reviewRejectType']) : null,
            clientComment: $data['clientComment'] ?? null,
            moderationComment: $data['moderationComment'] ?? null,
            buttonIds: $data['buttonIds'] ?? null,
            rawData: $data,
        );
    }

    public function toArray(): array
    {
        return [
            'reviewAnswer' => $this->reviewAnswer?->value,
            'rejectLabels' => array_map(fn (RejectionLabel $label) => $label->value, $this->rejectLabels ?? []),
            'reviewRejectType' => $this->reviewRejectType?->value,
            'clientComment' => $this->clientComment,
            'moderationComment' => $this->moderationComment,
            'buttonIds' => $this->buttonIds,
        ];
    }
}
