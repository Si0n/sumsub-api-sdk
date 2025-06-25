<?php

declare(strict_types=1);

namespace SumsubApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;
use SumsubApi\Authentication\SignRequestMiddleware;
use SumsubApi\DTO\Entities\AccessToken;
use SumsubApi\DTO\Entities\Applicant;
use SumsubApi\DTO\Entities\ApplicantAction;
use SumsubApi\DTO\Entities\ApplicationReviewStatus;
use SumsubApi\DTO\Entities\ApplicationStatus;
use SumsubApi\DTO\Entities\DeliveredDocument;
use SumsubApi\DTO\Entities\ExternalWebSDKLink;
use SumsubApi\DTO\Entities\RejectionReason;
use SumsubApi\DTO\Requests\CreateApplicant;
use SumsubApi\DTO\Requests\CreateApplicantAction;
use SumsubApi\DTO\Requests\GenerateExternalWebSDKLink;
use SumsubApi\DTO\Requests\RequestAccessToken;
use SumsubApi\DTO\Requests\SandboxApplicationComplete;
use SumsubApi\DTO\Requests\SendApplicationDocument;

class ApiClient
{
    private const string PATH_APPLICANTS = 'resources/applicants';
    private const string PATH_CREATE_APPLICANT_ACTION = 'resources/applicantActions/-/forApplicant/%s';
    private const string PATH_REQUEST_ACTION_CHECK = 'resources/applicantActions/%s/review/status/pending';
    private const string PATH_ACCESS_TOKENS = 'resources/accessTokens/sdk';
    private const string PATH_APPLICANT_STATUS = 'resources/applicants/%s/status';
    private const string PATH_APPLICANT_DATA = 'resources/applicants/%s/one';
    private const string PATH_RUN_AML_CHECK = 'resources/applicants/%s/recheck/aml';
    private const string PATH_REQUEST_APPLICANT_CHECK = 'resources/applicants/%s/status/pending';
    private const string PATH_SEND_ID_DOCUMENT = 'resources/applicants/%s/info/idDoc';
    private const string PATH_GET_APPLICATION_REVIEW_STATUS = 'resources/applicants/%s/status';
    private const string PATH_SANDBOX_CHECK_COMPLETE = 'resources/applicants/%s/status/testCompleted';
    private const string PATH_CLARIFY_REJECTION_REASON = 'resources/moderationStates/-;applicantId=%s';
    private const string PATH_GENERATE_EXTERNAL_WEBSDK_LINK = 'resources/sdkIntegrations/levels/-/websdkLink';

    protected ?Client $apiClient = null;

    public function __construct(
        protected Configuration $config,
        protected ?LoggerInterface $logger = null
    ) {
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function createApplicant(CreateApplicant $request): Applicant
    {
        $response = $this->getApiClient()->post(static::PATH_APPLICANTS, $request->toGuzzleOptions());

        return Applicant::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function createApplicantAction(CreateApplicantAction $request): ApplicantAction
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_CREATE_APPLICANT_ACTION, $request->applicantId), $request->toGuzzleOptions());

        return ApplicantAction::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function requestActionCheck(string $actionId): ApplicantAction
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_REQUEST_ACTION_CHECK, $actionId));

        return ApplicantAction::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function generateExternalWebSDKLink(GenerateExternalWebSDKLink $request): ExternalWebSDKLink
    {
        $response = $this->getApiClient()->post(static::PATH_GENERATE_EXTERNAL_WEBSDK_LINK, $request->toGuzzleOptions());

        return ExternalWebSDKLink::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function getApplicantData(string $applicantId): Applicant
    {
        $response = $this->getApiClient()->get(sprintf(static::PATH_APPLICANT_DATA, $applicantId));

        return Applicant::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function getApplicationReviewStatus(string $applicantId): ApplicationReviewStatus
    {
        $response = $this->getApiClient()->get(sprintf(static::PATH_GET_APPLICATION_REVIEW_STATUS, $applicantId));

        return ApplicationReviewStatus::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function clarifyRejectionReason(string $applicantId): RejectionReason
    {
        $response = $this->getApiClient()->get(sprintf(static::PATH_CLARIFY_REJECTION_REASON, $applicantId));

        return RejectionReason::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function sendApplicationDocument(SendApplicationDocument $request): DeliveredDocument
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_SEND_ID_DOCUMENT, $request->applicationId), $request->toGuzzleOptions());

        return DeliveredDocument::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function getApplicantStatus(string $applicantId): ApplicationStatus
    {
        $response = $this->getApiClient()->get(sprintf(static::PATH_APPLICANT_STATUS, $applicantId));

        return ApplicationStatus::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function runAmlCheck(string $applicantId): bool
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_RUN_AML_CHECK, $applicantId));
        $responseData = json_decode((string) $response->getBody(), true) ?? [];

        return isset($responseData['ok']) && 1 === (int) $responseData['ok'];
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function requestApplicantCheck(string $applicantId): bool
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_REQUEST_APPLICANT_CHECK, $applicantId));
        $responseData = json_decode((string) $response->getBody(), true) ?? [];

        return isset($responseData['ok']) && 1 === (int) $responseData['ok'];
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function requestAccessToken(RequestAccessToken $request): AccessToken
    {
        $response = $this->getApiClient()->post(static::PATH_ACCESS_TOKENS, $request->toGuzzleOptions());

        return AccessToken::fromResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \DateMalformedStringException
     */
    public function sandboxApplicationComplete(SandboxApplicationComplete $request): bool
    {
        $response = $this->getApiClient()->post(sprintf(static::PATH_SANDBOX_CHECK_COMPLETE, $request->applicantId), $request->toGuzzleOptions());
        $responseData = json_decode((string) $response->getBody(), true) ?? [];

        return isset($responseData['ok']) && 1 === (int) $responseData['ok'];
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
                formatter: new MessageFormatter('SumsubApi: {method} {uri} {req_body} >> ({code}:{phrase}) {res_body}')
            ));
        }
        $stack->push(new SignRequestMiddleware($this->config));

        return $this->apiClient = new Client([
            ...$this->config->guzzleOptions,
            'base_uri' => $this->config->apiUrl,
            'handler' => $stack,
        ]);
    }
}
