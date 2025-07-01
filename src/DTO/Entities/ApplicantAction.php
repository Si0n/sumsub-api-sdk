<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Entities;

use GuzzleHttp\Psr7\Response;
use SumsubApi\DTO\BaseEntity;
use SumsubApi\DTO\Parts\ApplicationPaymentSource;
use SumsubApi\DTO\Parts\Check;

class ApplicantAction implements BaseEntity
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTimeInterface $createdAt = null,
        public ?string $clientId = null,
        public ?string $externalActionId = null,
        public ?string $applicantId = null,
        public ?string $type = null,
        public ?ApplicationReviewStatus $review = null,
        public ?array $requiredIdDocs = null,
        public ?array $checks = null,
        public ?ApplicationPaymentSource $paymentSource = null,
        public array $rawData = [],
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    public static function fromResponse(Response $response): static
    {
        $data = json_decode((string) $response->getBody(), true) ?? [];

        return new static(
            id: $data['id'] ?? null,
            createdAt: isset($data['createdAt']) ? new \DateTimeImmutable($data['createdAt']) : null,
            clientId: $data['clientId'] ?? null,
            externalActionId: $data['externalActionId'] ?? null,
            applicantId: $data['applicantId'] ?? null,
            type: $data['type'] ?? null,
            review: isset($data['review']) ? ApplicationReviewStatus::fromArray($data['review']) : null,
            requiredIdDocs: $data['requiredIdDocs'] ?? null,
            checks: isset($data['checks']) ? array_map(Check::fromArray(...), $data['checks']) : null,
            paymentSource: isset($data['paymentSource']) ? ApplicationPaymentSource::fromArray($data['paymentSource']) : null,
            rawData: $data,
        );
    }
}
