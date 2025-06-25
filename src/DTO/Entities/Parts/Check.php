<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities\Parts;

use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\Enums\CheckType;

class Check implements BaseEntityPart
{
    public function __construct(
        public ?string $id = null,
        public ?string $answer = null,
        public ?CheckType $checkType = null,
        public ?\DateTimeInterface $createdAt = null,
        public ?string $attemptId = null,
        public ?array $livenessInfo = null,
        public ?array $faceMatchInfo = null,
        public ?string $errorMessage = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            id: $data['id'] ?? null,
            answer: $data['answer'] ?? null,
            checkType: !empty($data['checkType']) ? CheckType::tryFrom($data['checkType']) : null,
            createdAt: isset($data['createdAt']) ? new \DateTimeImmutable($data['createdAt']) : null,
            attemptId: $data['attemptId'] ?? null,
            livenessInfo: $data['livenessInfo'] ?? null,
            faceMatchInfo: $data['faceMatchInfo'] ?? null,
            errorMessage: $data['errorMessage'] ?? null,
            rawData: $data,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'answer' => $this->answer,
            'checkType' => $this->checkType?->value,
            'createdAt' => $this->createdAt?->format(\DateTimeInterface::RFC3339),
            'attemptId' => $this->attemptId,
            'livenessInfo' => $this->livenessInfo,
            'faceMatchInfo' => $this->faceMatchInfo,
            'errorMessage' => $this->errorMessage,
        ];
    }
}
