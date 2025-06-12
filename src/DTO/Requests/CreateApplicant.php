<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\ApplicantFixedInfo;
use SumsubApi\Enums\CompanyType;

readonly class CreateApplicant implements BaseRequest
{
    /**
     * @param string $levelName
     * @param string $externalUserId
     * @param string|null $email Applicant email address. It is mandatory if the email verification is required. If not provided, the applicant cannot receive verification status emails.
     * @param string|null $phone Applicant phone number. It is mandatory if the phone verification is required.
     * @param string|null $lang Two-letter code of the language (ISO 639-1 format, for example, en, fr, de)
     * @param CompanyType $type
     * @param ApplicantFixedInfo|null $fixedInfo
     * @param ApplicantFixedInfo|null $info
     * @param array $metadata Additional information is not displayed to the end-user. For example, [{"key": "keyFromClient", "value": "valueFromClient"}].
     */
    public function __construct(
        public string $levelName,
        public string $externalUserId,
        public ?string $email = null,
        public ?string $phone = null,
        public ?string $lang = null,
        public CompanyType $type = CompanyType::INDIVIDUAL,
        public ?ApplicantFixedInfo $fixedInfo = null,
        public ?ApplicantFixedInfo $info = null,
        public array $metadata = [],
    ) {
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter([
                'externalUserId' => $this->externalUserId,
                'email' => $this->email,
                'phone' => $this->phone,
                'lang' => $this->lang,
                'type' => $this->type->value,
                'fixedInfo' => $this->fixedInfo?->toArray(),
                'info' => $this->info?->toArray(),
                'metadata' => $this->metadata,
            ]),
            RequestOptions::QUERY => [
                'levelName' => $this->levelName,
            ],
        ];
    }
}
