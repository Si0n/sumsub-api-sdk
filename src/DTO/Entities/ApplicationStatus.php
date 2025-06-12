<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use SumsubApi\DTO\BaseEntity;
use SumsubApi\Enums\ReviewStatus;

class ApplicationStatus implements BaseEntity
{
    public function __construct(
        public ?string $reviewId = null,
        public ?string $attemptId = null,
        public ?int $attemptCnt = null,
        public ?int $elapsedSincePendingMs = null,
        public ?string $levelName = null,
        public ?\DateTimeInterface $createDate = null,
        public ?\DateTimeInterface $reviewDate = null,
        public ?ApplicationReviewResult $reviewResult = null,
        public ?ReviewStatus $reviewStatus = null,
        public ?int $priority = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            reviewId: $data['reviewId'] ?? null,
            attemptId: $data['attemptId'] ?? null,
            attemptCnt: $data['attemptCnt'] ?? null,
            elapsedSincePendingMs: $data['elapsedSincePendingMs'] ?? null,
            levelName: $data['levelName'] ?? null,
            createDate: isset($data['createDate']) ? new \DateTimeImmutable($data['createDate']) : null,
            reviewDate: isset($data['reviewDate']) ? new \DateTimeImmutable($data['reviewDate']) : null,
            reviewResult: ApplicationReviewResult::fromArray($data['reviewResult'] ?? []),
            reviewStatus: isset($data['reviewStatus']) ? ReviewStatus::tryFrom($data['reviewStatus']) : null,
            rawData: $data,
        );
    }
}
