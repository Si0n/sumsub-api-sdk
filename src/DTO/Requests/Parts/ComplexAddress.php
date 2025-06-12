<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests\Parts;

use SumsubApi\DTO\BaseRequestPart;

readonly class ComplexAddress implements BaseRequestPart
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
}
