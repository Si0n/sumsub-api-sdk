<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Parts;

use SumsubApi\DTO\BaseRequestPart;

readonly class ApplicantCompanyInfo implements BaseRequestPart
{
    /**
     * @param ?bool $noUBOs         When set to true, a company is to be verified with no UBOs specified in the company profile. For example, in case when another legal entity that cannot be a UBO owns this company.
     * @param ?bool $noShareholders When set to true, a company is to be verified with no shareholders specified in the company profile. For example, in case when the verification level settings require a company to have three shareholders but the company has just one.
     */
    public function __construct(
        public ?string $companyName = null,
        public ?string $registrationNumber = null,
        public ?string $country = null,
        public ?array $alternativeNames = null,
        public ?string $legalAddress = null,
        public ?Address $address = null,
        public ?\DateTimeInterface $incorporatedOn = null,
        public ?string $type = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?string $controlScheme = null,
        public ?string $taxId = null,
        public ?string $registrationLocation = null,
        public ?string $website = null,
        public ?string $postalAddress = null,
        public ?bool $noUBOs = null,
        public ?bool $noShareholders = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'companyName' => $this->companyName,
            'registrationNumber' => $this->registrationNumber,
            'country' => $this->country,
            'alternativeNames' => $this->alternativeNames,
            'legalAddress' => $this->legalAddress,
            'address' => $this->address?->toArray(),
            'incorporatedOn' => $this->incorporatedOn?->format('Y-m-d'),
            'type' => $this->type,
            'email' => $this->email,
            'phone' => $this->phone,
            'controlScheme' => $this->controlScheme,
            'taxId' => $this->taxId,
            'registrationLocation' => $this->registrationLocation,
            'website' => $this->website,
            'postalAddress' => $this->postalAddress,
            'noUBOs' => $this->noUBOs,
            'noShareholders' => $this->noShareholders,
        ];
    }
}
