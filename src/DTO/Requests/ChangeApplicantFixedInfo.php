<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Parts\ApplicantFixedInfo;

readonly class ChangeApplicantFixedInfo implements BaseRequest
{
    public function __construct(
        public string $applicantId,
        public ApplicantFixedInfo $applicantFixedInfo,
    ) {
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter($this->applicantFixedInfo->toArray(), fn (mixed $value) => !is_null($value)),
        ];
    }
}
