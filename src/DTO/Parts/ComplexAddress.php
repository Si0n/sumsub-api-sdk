<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Parts;

use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\DTO\BaseRequestPart;

readonly class ComplexAddress implements BaseRequestPart, BaseEntityPart
{
    public function __construct(
        public ?string $country = null,
        public ?string $postCode = null,
        public ?string $town = null,
        public ?string $street = null,
        public ?string $subStreet = null,
        public ?string $state = null,
        public ?string $buildingName = null,
        public ?string $flatNumber = null,
        public ?string $buildingNumber = null,
        public ?string $formattedAddress = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'country' => $this->country,
            'postCode' => $this->postCode,
            'town' => $this->town,
            'street' => $this->street,
            'subStreet' => $this->subStreet,
            'state' => $this->state,
            'buildingName' => $this->buildingName,
            'flatNumber' => $this->flatNumber,
            'buildingNumber' => $this->buildingNumber,
            'formattedAddress' => $this->formattedAddress,
        ];
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            country: $data['country'] ?? null,
            postCode: $data['postCode'] ?? null,
            town: $data['town'] ?? null,
            street: $data['street'] ?? null,
            subStreet: $data['subStreet'] ?? null,
            state: $data['state'] ?? null,
            buildingName: $data['buildingName'] ?? null,
            flatNumber: $data['flatNumber'] ?? null,
            buildingNumber: $data['buildingNumber'] ?? null,
            formattedAddress: $data['formattedAddress'] ?? null,
        );
    }
}
