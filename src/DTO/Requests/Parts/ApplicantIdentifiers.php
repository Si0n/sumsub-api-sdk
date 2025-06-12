<?php

namespace SumsubApi\DTO\Requests\Parts;

use SumsubApi\DTO\BaseRequestPart;

readonly class ApplicantIdentifiers implements BaseRequestPart
{
    public function __construct(
        public ?string $email = null,
        public ?string $phone = null
    ) {
    }

    public function toArray(): array
    {
        return array_filter([
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
    }
}
