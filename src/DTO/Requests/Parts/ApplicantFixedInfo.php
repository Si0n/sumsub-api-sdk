<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests\Parts;

use SumsubApi\DTO\BaseRequestPart;
use SumsubApi\Enums\Gender;

readonly class ApplicantFixedInfo implements BaseRequestPart
{
    /**
     * @param ApplicantCompanyInfo|null $companyInfo
     * @param string|null $firstName
     * @param string|null $middleName
     * @param string|null $lastName
     * @param string|null $legalName
     * @param Gender|null $gender
     * @param \DateTimeInterface|null $dob
     * @param string|null $placeOfBirth
     * @param string|null $countryOfBirth
     * @param string|null $stateOfBirth
     * @param string|null $country
     * @param string|null $nationality
     * @param ComplexAddress[]|null $addresses
     * @param string|null $tin
     * @param string|null $taxResidenceCountry
     */
    public function __construct(
        public ?ApplicantCompanyInfo $companyInfo = null,
        public ?string $firstName = null,
        public ?string $middleName = null,
        public ?string $lastName = null,
        public ?string $legalName = null,
        public ?Gender $gender = null,
        public ?\DateTimeInterface $dob = null,
        public ?string $placeOfBirth = null,
        public ?string $countryOfBirth = null,
        public ?string $stateOfBirth = null,
        public ?string $country = null,
        public ?string $nationality = null,
        public ?array $addresses = null,
        public ?string $tin = null,
        public ?string $taxResidenceCountry = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'companyInfo' => $this->companyInfo?->toArray(),
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'legalName' => $this->legalName,
            'gender' => $this->gender->value,
            'dob' => $this->dob?->format('Y-m-d'),
            'placeOfBirth' => $this->placeOfBirth,
            'countryOfBirth' => $this->countryOfBirth,
            'stateOfBirth' => $this->stateOfBirth,
            'country' => $this->country,
            'nationality' => $this->nationality,
            'addresses' => array_map(fn (ComplexAddress $address) => $address->toArray(), $this->addresses ?? []),
            'tin' => $this->tin,
            'taxResidenceCountry' => $this->taxResidenceCountry,
        ];
    }
}
