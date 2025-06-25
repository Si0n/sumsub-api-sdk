<?php

declare(strict_types=1);

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\DTO\Requests\Parts\PaymentSource;

readonly class CreateApplicantAction implements BaseRequest
{
    public function __construct(
        public string $applicantId,
        public string $levelName,
        public string $externalActionId,
        public ?PaymentSource $paymentSource = null,
        public ?array $questionnaires = null,
        public ?string $email = null,
        public ?string $phone = null,
    ) {
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::JSON => array_filter([
                'applicantId' => $this->applicantId,
                'levelName' => $this->levelName,
                'externalActionId' => $this->externalActionId,
                'paymentSource' => $this->paymentSource?->toArray(),
                'questionnaires' => $this->questionnaires,
                'email' => $this->email,
                'phone' => $this->phone,
            ]),
            RequestOptions::QUERY => [
                'levelName' => $this->levelName,
            ],
        ];
    }
}
