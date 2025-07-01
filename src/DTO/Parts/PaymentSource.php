<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Parts;

use SumsubApi\DTO\BaseRequestPart;
use SumsubApi\Enums\PaymentSourceType;

readonly class PaymentSource implements BaseRequestPart
{
    public function __construct(
        public ?string $institutionName = null,
        public ?string $fullName = null,
        public ?string $country = null,
        public ?string $accountIdentifier = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?\DateTimeInterface $issuedDate = null,
        public ?\DateTimeInterface $validUntil = null,
        public ?PaymentSourceType $type = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'fixedInfo' => array_filter([
                'institutionName' => $this->institutionName,
                'fullName' => $this->fullName,
                'country' => $this->country,
                'accountIdentifier' => $this->accountIdentifier,
                'email' => $this->email,
                'phone' => $this->phone,
                'issuedDate' => $this->issuedDate?->format(\DateTimeInterface::ATOM),
                'validUntil' => $this->validUntil?->format(\DateTimeInterface::ATOM),
                'type' => $this->type?->value,
            ]),
        ];
    }
}
