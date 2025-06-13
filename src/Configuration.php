<?php

declare(strict_types=1);

namespace SumsubApi;

readonly class Configuration
{
    public const array DEFAULT_GUZZLE_OPTIONS = [
        'timeout' => 30,
        'connect_timeout' => 30,
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];

    public function __construct(
        public ?string $appToken,
        public ?string $secretKey,
        public string $apiUrl = 'https://api.sumsub.com',
        public array $guzzleOptions = self::DEFAULT_GUZZLE_OPTIONS,
    ) {
        if (!empty($this->apiUrl) && !filter_var($this->apiUrl, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Invalid API URL provided');
        }
    }
}
