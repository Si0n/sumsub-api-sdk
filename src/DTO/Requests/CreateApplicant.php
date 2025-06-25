<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\ApplicantCompanyInfo;
use SumsubApi\DTO\Requests\Parts\ApplicantFixedInfo;
use SumsubApi\Enums\CompanyType;

readonly class CreateApplicant implements BaseRequest
{
    /**
     * @param string|null $email    Applicant email address. It is mandatory if the email verification is required. If not provided, the applicant cannot receive verification status emails.
     * @param string|null $phone    Applicant phone number. It is mandatory if the phone verification is required.
     * @param string|null $lang     Two-letter code of the language (ISO 639-1 format, for example, en, fr, de)
     * @param array       $metadata Additional information is not displayed to the end-user. For example, [{"key": "keyFromClient", "value": "valueFromClient"}].
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

    public static function individualApplicant(
        string $levelName,
        string $externalUserId,
        ?string $email,
        ?string $phone,
        ApplicantFixedInfo $fixedInfo,
        array $metadata = []
    ): self {
        return new self(
            levelName: $levelName,
            externalUserId: $externalUserId,
            email: $email,
            phone: $phone,
            type: CompanyType::INDIVIDUAL,
            fixedInfo: $fixedInfo,
            metadata: $metadata
        );
    }

    public static function companyApplicant(
        string $levelName,
        string $externalUserId,
        ApplicantCompanyInfo $companyInfo,
        array $metadata = []
    ): self {
        return new self(
            levelName: $levelName,
            externalUserId: $externalUserId,
            type: CompanyType::COMPANY,
            fixedInfo: new ApplicantFixedInfo(
                companyInfo: $companyInfo
            ),
            metadata: $metadata
        );
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
