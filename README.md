# Sumsub PHP SDK

A modern PHP 8.4 SDK for the Sumsub API, providing a type-safe interface to interact with Sumsub's verification services.

## Features

- Partial support for Sumsub API endpoints
- Type-safe DTOs for requests and responses
- Automatic request signing with HMAC-SHA256
- PSR-3 compatible logging
- PHP 8.4 features (typed properties, enums, etc.)
- Strict type declarations
- PSR-12 compliant code style

## Requirements

- PHP 8.4 or higher
- Guzzle 7.0 or higher
- PSR-3 compatible logger (optional)

## Installation

```bash
composer require sumsub/php-sdk
```

## Laravel Integration

To integrate the SDK with Laravel, you can bind the Configuration in your `AppServiceProvider`:

```php
use SumsubApi\Configuration;
use SumsubApi\ApiClient;
use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(ApiClient::class)
            ->needs(Configuration::class)
            ->give(function (Application $application) {
                $config = $application->get(ConfigContract::class);
                
                return new Configuration(
                    apiUrl: $config->get('services.sumsub.api_url', 'https://test-api.sumsub.com'),
                    appToken: $config->get('services.sumsub.app_token'),
                    secretKey: $config->get('services.sumsub.secret_key')
                );
            });
    }
}
```

Then add the following to your `config/services.php`:

```php
return [
    // ... other services ...
    
    'sumsub' => [
        'api_url' => env('SUMSUB_API_URL', 'https://test-api.sumsub.com'),
        'app_token' => env('SUMSUB_APP_TOKEN'),
        'secret_key' => env('SUMSUB_SECRET_KEY'),
    ],
];
```

And in your `.env` file:

```env
SUMSUB_API_URL=https://test-api.sumsub.com
SUMSUB_APP_TOKEN=your-app-token
SUMSUB_SECRET_KEY=your-secret-key
```

## Usage

```php
use SumsubApi\ApiClient;
use SumsubApi\Configuration;
use SumsubApi\DTO\Requests\CreateApplicant;
use SumsubApi\DTO\Requests\Parts\ApplicantFixedInfo;
use SumsubApi\DTO\Entities\Applicant;

// Initialize configuration
$config = new Configuration(
    apiUrl: 'https://test-api.sumsub.com',
    appToken: 'your-app-token',
    secretKey: 'your-secret-key'
);

// Initialize the client
$client = new ApiClient(
    config: $config,
    logger: $logger // Optional PSR-3 logger
);

// Create an individual applicant
$request = new CreateApplicant(
    levelName: 'basic-kyc-level',
    externalUserId: 'user123',
    email: 'john.doe@example.com',
    phone: '+1234567890',
    fixedInfo: new ApplicantFixedInfo(
        country: 'USA',
        placeOfBirth: 'New York'
    )
);

$applicant = $client->createApplicant($request);

// Get applicant data
$applicantData = $client->getApplicantData($applicant->id);

// Get applicant status
$status = $client->getApplicantStatus($applicant->id);

// Request access token
$accessToken = $client->requestAccessToken(
    new RequestAccessToken(
        levelName: 'basic-kyc-level',
        userId: $applicant->externalUserId,
    )
);
```

## Development

The SDK follows PSR-12 coding standards. To ensure code quality, run:

```bash
composer require --dev friendsofphp/php-cs-fixer
vendor/bin/php-cs-fixer fix
```

## Project Structure

```
src/
├── ApiClient.php              # Main API client
├── Authentication/            # Authentication related classes
├── Configuration.php          # SDK configuration
├── DTO/                       # Data Transfer Objects
│   ├── BaseEntity.php        # Base interface for entities
│   ├── BaseRequest.php       # Base interface for requests
│   ├── Entities/             # Response entities
│   └── Requests/             # Request DTOs
└── Enums/                    # PHP 8.4 enums
```

## License

MIT