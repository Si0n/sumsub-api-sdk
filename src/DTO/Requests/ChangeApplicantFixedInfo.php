<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\ApplicantFixedInfo;
use SumsubApi\Enums\Gender;

readonly class ChangeApplicantFixedInfo extends ApplicantFixedInfo implements BaseRequest
{
    public function __construct(
        public string $applicantId,
        ?string $firstName = null,
        ?string $middleName = null,
        ?string $lastName = null,
        ?string $legalName = null,
        ?Gender $gender = null,
        ?\DateTimeInterface $dob = null,
        ?string $placeOfBirth = null,
        ?string $countryOfBirth = null,
        ?string $stateOfBirth = null,
        ?string $country = null,
        ?string $nationality = null,
        ?array $addresses = null,
        ?string $tin = null,
    ) {
        parent::__construct(
            firstName: $firstName,
            middleName: $middleName,
            lastName: $lastName,
            legalName: $legalName,
            gender: $gender,
            dob: $dob,
            placeOfBirth: $placeOfBirth,
            countryOfBirth: $countryOfBirth,
            stateOfBirth: $stateOfBirth,
            country: $country,
            nationality: $nationality,
            addresses: $addresses,
            tin: $tin,
        );
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter($this->toArray()),
        ];
    }
}
