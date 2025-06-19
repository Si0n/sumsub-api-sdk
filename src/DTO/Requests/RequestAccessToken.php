<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\ApplicantIdentifiers;

readonly class RequestAccessToken implements BaseRequest
{
    public function __construct(
        public string $userId,
        public string $levelName,
        public ?ApplicantIdentifiers $applicantIdentifiers = null,
        public ?string $externalActionId = null,
        public ?int $ttlInSecs = 600 // Default to 600 seconds (10 minutes)
    ) {
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
