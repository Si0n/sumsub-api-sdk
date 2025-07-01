<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;
use SumsubApi\DTO\BaseEntityPart;
use SumsubApi\Enums\CompanyType;

class Applicant implements BaseEntity, BaseEntityPart
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTimeInterface $createdAt = null,
        public ?string $clientId = null,
        public ?string $inspectionId = null,
        public ?string $externalUserId = null,
        public ?string $sourceKey = null,
        public ?array $info = null,
        public ?array $fixedInfo = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?string $applicantPlatform = null,
        public ?string $ipCountry = null,
        public ?string $authCode = null,
        public ?array $agreement = null,
        public ?array $requiredIdDocs = null,
        public ?array $review = null,
        public ?string $lang = null,
        public ?array $metadata = null,
        public ?CompanyType $type = null,
        public ?array $riskLabels = null,
        public ?array $questionnaires = null,
        public ?array $notes = null,
        public ?array $tags = null,
        public ?array $memberOf = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return static::fromArray($data);
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromArray(array $data): static
    {
        return new static(
            id: $data['id'] ?? null,
            createdAt: isset($data['createdAt']) ? new \DateTimeImmutable($data['createdAt']) : null,
            clientId: $data['clientId'] ?? null,
            inspectionId: $data['inspectionId'] ?? null,
            externalUserId: $data['externalUserId'] ?? null,
            sourceKey: $data['sourceKey'] ?? null,
            info: $data['info'] ?? null,
            fixedInfo: $data['fixedInfo'] ?? null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            applicantPlatform: $data['applicantPlatform'] ?? null,
            ipCountry: $data['ipCountry'] ?? null,
            authCode: $data['authCode'] ?? null,
            agreement: $data['agreement'] ?? null,
            requiredIdDocs: $data['requiredIdDocs'] ?? null,
            review: $data['review'] ?? null,
            lang: $data['lang'] ?? null,
            metadata: $data['metadata'] ?? null,
            type: isset($data['type']) ? CompanyType::from($data['type']) : null,
            riskLabels: $data['riskLabels'] ?? null,
            questionnaires: $data['questionnaires'] ?? null,
            notes: $data['notes'] ?? null,
            tags: $data['tags'] ?? null,
            memberOf: $data['memberOf'] ?? null,
            rawData: $data,
        );
    }
}
