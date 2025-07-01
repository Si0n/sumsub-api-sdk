<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Parts;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;
use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\DTO\BaseRequestPart;
use SumsubApi\Enums\Gender;

readonly class ApplicantFixedInfo implements BaseRequestPart, BaseEntityPart, BaseEntity
{
    /**
     * @param ComplexAddress[]|null $addresses
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
            'gender' => $this->gender?->value,
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

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true);

        return static::fromArray($data);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            firstName: $data['firstName'] ?? null,
            middleName: $data['middleName'] ?? null,
            lastName: $data['lastName'] ?? null,
            legalName: $data['legalName'] ?? null,
            gender: isset($data['gender']) ? Gender::tryFrom($data['gender']) : null,
            dob: isset($data['dob']) ? new \DateTimeImmutable($data['dob']) : null,
            placeOfBirth: $data['placeOfBirth'] ?? null,
            countryOfBirth: $data['countryOfBirth'] ?? null,
            stateOfBirth: $data['stateOfBirth'] ?? null,
            country: $data['country'] ?? null,
            nationality: $data['nationality'] ?? null,
            addresses: isset($data['addresses']) && is_array($data['addresses']) ? array_map(fn (array $address) => ComplexAddress::fromArray($address), $data['addresses'])
                : null,
            tin: $data['tin'] ?? null,
        );
    }
}
