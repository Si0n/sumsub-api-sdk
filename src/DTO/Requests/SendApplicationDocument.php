<?php

namespace SumsubApi\DTO\Requests;

use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use SumsubApi\DTO\BaseRequest;
use SumsubApi\Enums\DocumentSubType;
use SumsubApi\Enums\DocumentType;

readonly class SendApplicationDocument implements BaseRequest
{
    public function __construct(
        public string $applicationId,
        public DocumentType $idDocType,
        public DocumentSubType $idDocSubType,
        public string $country,
        public mixed $file,
        public string $fileName,
        public ?string $firstName = null,
        public ?string $middleName = null,
        public ?string $lastName = null,
        public ?\DateTimeInterface $issuedDate = null,
        public ?\DateTimeInterface $validUntil = null,
        public ?string $number = null,
        public ?\DateTimeInterface $dob = null,
        public ?string $placeOfBirth = null,
        public bool $returnDocWarnings = true,
    ) {
    }

    public function toGuzzleOptions(): array
    {
        return [
            RequestOptions::MULTIPART => [
                [
                    'name' => 'metadata',
                    'contents' => json_encode(array_filter([
                        'idDocType' => $this->idDocType->value,
                        'idDocSubType' => $this->idDocSubType->value,
                        'country' => $this->country,
                        'firstName' => $this->firstName,
                        'middleName' => $this->middleName,
                        'lastName' => $this->lastName,
                        'issuedDate' => $this->issuedDate?->format('Y-m-d'),
                        'validUntil' => $this->validUntil?->format('Y-m-d'),
                        'number' => $this->number,
                        'dob' => $this->dob?->format('Y-m-d'),
                        'placeOfBirth' => $this->placeOfBirth,
                    ])),
                ],
                [
                    'name' => 'file',
                    'contents' => Utils::streamFor($this->file),
                    'filename' => $this->fileName,
                ],
            ],
            RequestOptions::HEADERS => [
                'X-Return-Doc-Warnings' => $this->returnDocWarnings ? 'true' : 'false',
            ],
        ];
    }
}
