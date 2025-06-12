<?php

declare(strict_types=1);

namespace SumsubApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Psr\Log\LoggerInterface;
use SumsubApi\Authentication\SignRequestMiddleware;
use SumsubApi\DTO\Entities\Applicant;
use SumsubApi\DTO\Requests\CreateApplicant;

class ApiClient
{
    private const string PATH_APPLICANTS = 'resources/applicants';
    private const string PATH_ACCESS_TOKENS = 'resources/accessTokens';
    private const string PATH_APPLICANT_STATUS = 'resources/applicants/%s/status';
    private const string PATH_APPLICANT_DATA = 'resources/applicants/%s/one';

    protected ?Client $apiClient = null;

    public function __construct(
        protected Configuration $config,
        protected ?LoggerInterface $logger = null
    ) {
    }

    /**
     * @param CreateApplicant $request
     * @return Applicant
     *
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function createApplicant(CreateApplicant $request): Applicant
    {
        $response = $this->getApiClient()->post(static::PATH_APPLICANTS, $request->toGuzzleOptions());

        return Applicant::fromArray(json_decode((string) $response->getBody(), true) ?? []);
    }


    public function getApiClient(): Client
    {
        if ($this->apiClient) {
            return $this->apiClient;
        }

        $stack = HandlerStack::create();

        if ($this->logger) {
            $stack->push(Middleware::log(
                logger: $this->logger,
                formatter: new MessageFormatter('Sumsub: {method} {uri} {req_body} >> ({code}:{phrase}) {res_body}')
            ));
        }
        $stack->push(new SignRequestMiddleware($this->config));

        return $this->apiClient = new Client([
            'base_uri' => $this->config->apiUrl,
            'handler' => $stack,
        ]);
    }
}
