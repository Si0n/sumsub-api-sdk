<?php

declare(strict_types=1);

namespace SumsubApi\Authentication;

use Psr\Http\Message\RequestInterface;
use SumsubApi\Configuration;

class SignRequestMiddleware
{
    public function __construct(
        protected Configuration $config,
    ) {
    }

    public function __invoke(callable $handler): \Closure
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $request = $request
                ->withHeader('X-App-Token', $this->config->appToken)
                ->withHeader('X-App-Access-Ts', $now = time())
                ->withHeader('X-App-Access-Sig', $this->createSignature($request, $now));

            return $handler($request, $options);
        };
    }

    protected function createSignature(RequestInterface $request, int $ts): string
    {
        $method = strtoupper($request->getMethod());
        $uri = $request->getUri();
        $pathUrl = $uri->getPath();
        $query = $uri->getQuery();
        if (!empty($query)) {
            $pathUrl .= '?' . $query;
        }
        $body = (string) $request->getBody(); // Guzzle uses streams
        $bodyBytes = $body !== '' ? $body : '';

        $dataToSign = $ts . $method . $pathUrl . $bodyBytes;

        return hash_hmac('sha256', $dataToSign, $this->config->secretKey);
    }
}
