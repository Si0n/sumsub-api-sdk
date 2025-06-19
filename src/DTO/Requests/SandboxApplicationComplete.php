<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\Enums\RejectionLabel;
use SumsubApi\Enums\ReviewAnswer;
use SumsubApi\Enums\ReviewRejectType;

class SandboxApplicationComplete implements BaseRequest
{
    public array $rejectLabels = [];

    public function __construct(
        public string $applicantId,
        public ReviewAnswer $reviewAnswer,
        public ReviewRejectType $reviewRejectType,
        public ?string $clientComment = null,
        public ?string $moderationComment = null,
        RejectionLabel ...$rejectLabels,
    ) {
        if (ReviewAnswer::RED === $this->reviewAnswer && empty($rejectLabels)) {
            throw new \InvalidArgumentException('Reject labels must be provided when review answer is RED.');
        }
        $isFinal = ReviewRejectType::FINAL === $this->reviewRejectType;

        $this->rejectLabels = array_filter($this->rejectLabels, fn (RejectionLabel $label) => match($isFinal) {
            true => $label->isFinal(),
            false => !$label->isFinal(),
        });
    }


    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter([
                'reviewAnswer' => $this->reviewAnswer->value,
                'reviewRejectType' => $this->reviewRejectType->value,
                'rejectLabels' => array_map(fn (RejectionLabel $label) => $label->value, $this->rejectLabels),
            ]),
        ];
    }
}
