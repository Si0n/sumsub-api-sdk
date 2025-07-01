<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities\Parts;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;
use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\DTO\Requests\Parts\ApplicantFixedInfo as RequestApplicantFixedInfo;
use SumsubApi\Enums\Gender;

readonly class ApplicantFixedInfo extends RequestApplicantFixedInfo implements BaseEntity, BaseEntityPart
{
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
            addresses: $data['addresses'] ?? null,
            tin: $data['tin'] ?? null,
        );
    }
}
