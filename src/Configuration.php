<?php

declare(strict_types=1);

namespace SumsubApi;

readonly class Configuration
{
    public function __construct(
        public ?string $appToken,
        public ?string $secretKey,
        public string $apiUrl = 'https://api.sumsub.com',
    ) {
        if (!empty($this->apiUrl) && !filter_var($this->apiUrl, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Invalid API URL provided');
        }
    }
}
