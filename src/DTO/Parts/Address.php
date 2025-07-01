<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Parts;

use SumsubApi\DTO\BaseRequestPart;

readonly class Address implements BaseRequestPart
{
    public function __construct(
        public ?string $street = null,
        public ?string $subStreet = null,
        public ?string $town = null,
        public ?string $state = null,
        public ?string $postCode = null,
        public ?string $country = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'subStreet' => $this->subStreet,
            'town' => $this->town,
            'state' => $this->state,
            'postCode' => $this->postCode,
            'country' => $this->country,
        ];
    }
}
