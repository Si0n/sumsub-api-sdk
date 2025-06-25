<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities\Parts;

use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\Enums\PaymentSourceType;

class PaymentSourceFixedInfo implements BaseEntityPart
{
    public function __construct(
        public ?PaymentSourceType $type = null,
        public ?string $institutionName = null,
        public ?array $institutionNameEn = null,
        public ?string $fullName = null,
        public ?array $fullNameEn = null,
        public ?string $accountIdentifier = null,
        public array $rawData = [],
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            type: !empty($data['type']) ? PaymentSourceType::tryFrom($data['type']) : null,
            institutionName: $data['institutionName'] ?? null,
            institutionNameEn: $data['institutionNameEn'] ?? null,
            fullName: $data['fullName'] ?? null,
            fullNameEn: $data['fullNameEn'] ?? null,
            accountIdentifier: $data['accountIdentifier'] ?? null,
            rawData: $data,
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type?->value,
            'institutionName' => $this->institutionName,
            'institutionNameEn' => $this->institutionNameEn,
            'fullName' => $this->fullName,
            'fullNameEn' => $this->fullNameEn,
            'accountIdentifier' => $this->accountIdentifier,
        ];
    }
}
