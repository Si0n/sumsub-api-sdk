<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\ApplicantIdentifiers;

readonly class GenerateExternalWebSDKLink implements BaseRequest
{
    public function __construct(
        public string $levelName,
        public string $userId,
        public ?ApplicantIdentifiers $applicantIdentifiers = null,
        public ?string $externalActionId = null,
        public ?int $ttlInSecs = 1800 // Default to 1800 seconds (30 minutes)
    ) {
    }

    public static function forApplicant(string $levelName, string $userId, ApplicantIdentifiers $applicantIdentifiers, ?int $ttlInSecs = 1800): self
    {
        return new self(
            levelName: $levelName,
            userId: $userId,
            applicantIdentifiers: $applicantIdentifiers,
            ttlInSecs: $ttlInSecs
        );
    }

    public static function forExistingApplicantAction(string $actionLevelName, string $userId, string $externalActionId, ?int $ttlInSecs = 1800): self
    {
        return new self(
            levelName: $actionLevelName,
            userId: $userId,
            externalActionId: $externalActionId,
            ttlInSecs: $ttlInSecs
        );
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter([
                'userId' => $this->userId,
                'levelName' => $this->levelName,
                'applicantIdentifiers' => $this->applicantIdentifiers?->toArray(),
                'externalActionId' => $this->externalActionId,
                'ttlInSecs' => $this->ttlInSecs,
            ]),
        ];
    }
}
