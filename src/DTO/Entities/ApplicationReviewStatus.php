<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;
use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\DTO\Entities\Parts\ReviewResult;
use SumsubApi\Enums\ReviewStatus;

class ApplicationReviewStatus implements BaseEntity, BaseEntityPart
{
    public function __construct(
        public ?string $reviewId = null,
        public ?string $levelName = null,
        public ?string $attemptId = null,
        public ?int $attemptCnt = null,
        public ?int $elapsedSincePendingMs = null,
        public ?\DateTimeInterface $createDate = null,
        public ?\DateTimeInterface $reviewDate = null,
        public ?ReviewResult $reviewResult = null, // This should be a specific type if known
        public ?ReviewStatus $reviewStatus = null, // This should be an enum if applicable
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return static::fromArray($data);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            reviewId: $data['reviewId'] ?? null,
            levelName: $data['levelName'] ?? null,
            attemptId: $data['attemptId'] ?? null,
            attemptCnt: $data['attemptCnt'] ?? null,
            elapsedSincePendingMs: $data['elapsedSincePendingMs'] ?? null,
            createDate: isset($data['createDate']) ? new \DateTimeImmutable($data['createDate']) : null,
            reviewDate: isset($data['reviewDate']) ? new \DateTimeImmutable($data['reviewDate']) : null,
            reviewResult: ReviewResult::fromArray($data['reviewResult'] ?? []),
            reviewStatus: !empty($data['reviewStatus']) ? ReviewStatus::tryFrom($data['reviewStatus']) : null,
            rawData: $data,
        );
    }
}
