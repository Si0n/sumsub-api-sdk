<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\Enums\DocumentType;

class DeliveredDocument
{
    public function __construct(
        public ?string $imageId = null,
        public ?DocumentType $idDocType = null,
        public ?string $country = null,
        public ?\DateTimeInterface $issuedDate = null,
        public ?string $number = null,
        public ?\DateTimeInterface $dob = null,
        public ?string $placeOfBirth = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): self
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return new self(
            imageId: $response->getHeaderLine('X-Image-Id'),
            idDocType: $data['idDocType'] ? DocumentType::tryFrom($data['idDocType']) : null,
            country: $data['country'] ?? null,
            issuedDate: isset($data['issuedDate']) ? new \DateTimeImmutable($data['issuedDate']) : null,
            number: $data['number'] ?? null,
            dob: isset($data['dob']) ? new \DateTimeImmutable($data['dob']) : null,
            placeOfBirth: $data['placeOfBirth'] ?? null,
            rawData: $data,
        );
    }
}
