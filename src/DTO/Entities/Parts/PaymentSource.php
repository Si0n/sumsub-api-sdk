<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities\Parts;

use SumsubApi\DTO\BaseEntityPart;

class PaymentSource implements BaseEntityPart
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTimeInterface $createdAt = null,
        public ?PaymentSourceFixedInfo $fixedInfo = null,
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
            createdAt: isset($data['createdAt']) ? new \DateTimeImmutable($data['createdAt']) : null,
            fixedInfo: isset($data['fixedInfo']) ? PaymentSourceFixedInfo::fromArray($data['fixedInfo']) : null,
            rawData: $data,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'createdAt' => $this->createdAt?->format(\DateTimeInterface::RFC3339),
            'fixedInfo' => $this->fixedInfo?->toArray() ?? [],
            'rawData' => $this->rawData,
        ];
    }
}
