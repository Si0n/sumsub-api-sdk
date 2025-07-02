<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;

readonly class ChangeApplicantLevel implements BaseRequest
{
    public function __construct(
        public string $applicantId,
        public string $levelName,
    ) {
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::QUERY => [
                'levelName' => $this->levelName,
            ],
        ];
    }
}
