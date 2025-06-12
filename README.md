# Sumsub PHP SDK

This is a PHP 8.4 SDK for the Sumsub API. It provides a simple interface to interact with Sumsub's verification services.

## Installation

```bash
composer require sumsub/php-sdk
```

## Usage

```php
use Sumsub\ApiClient;
use Sumsub\DTO\Requests\CreateIndividualApplicant;
use Sumsub\DTO\Entities\Applicant;

// Initialize the client
$client = new ApiClient(
    appToken: 'your-app-token',
    secretKey: 'your-secret-key'
);

// Create an applicant
$request = new CreateIndividualApplicant(
    externalUserId: 'user123',
    email: 'john.doe@example.com',
    phone: '+1234567890',
    fixedInfo: [
        'country' => 'USA',
        'placeOfBirth' => 'New York'
    ]
);

$applicant = $client->createApplicant($request->toArray(), 'basic-kyc-level');

// Get access token
$accessToken = $client->getAccessToken('user123', 'basic-kyc-level');

// Get applicant status
$status = $client->getApplicantStatus($applicant['id']);

// Get applicant data
$data = $client->getApplicantData($applicant['id']);
```

## Features

- Full support for Sumsub API endpoints
- Type-safe DTOs for requests and responses
- Automatic request signing
- PSR-3 compatible logging
- PHP 8.4 features (typed properties, enums, etc.)

## Requirements

- PHP 8.4 or higher
- Guzzle 7.0 or higher
- PSR-3 compatible logger (optional)

## License

MIT 