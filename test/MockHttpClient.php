<?php

namespace Sedo\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * Mock HTTP client for testing API services.
 */
class MockHttpClient
{
    /**
     * @var array History container to record requests
     */
    private array $container = [];

    private MockHandler $mockHandler;

    private Client $client;

    /**
     * Create a new mock HTTP client.
     */
    public function __construct()
    {
        $this->mockHandler = new MockHandler();
        $handlerStack = HandlerStack::create($this->mockHandler);

        // Add history middleware to record requests
        $history = Middleware::history($this->container);
        $handlerStack->push($history);

        $this->client = new Client(['handler' => $handlerStack]);
    }

    /**
     * Queue a response to be returned by the mock client.
     *
     * @param int         $status  HTTP status code
     * @param array       $headers Response headers
     * @param string      $body    Response body
     * @param string      $version HTTP protocol version
     * @param string|null $reason  Reason phrase
     */
    public function addResponse(
        int $status = 200,
        array $headers = [],
        string $body = '{}',
        string $version = '1.1',
        ?string $reason = null,
    ): self {
        $this->mockHandler->append(new Response($status, $headers, $body, $version, $reason));

        return $this;
    }

    /**
     * Get the Guzzle HTTP client.
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Get the last request made.
     */
    public function getLastRequest(): ?RequestInterface
    {
        if (empty($this->container)) {
            return null;
        }

        return $this->container[count($this->container) - 1]['request'];
    }

    /**
     * Get all recorded requests.
     */
    public function getRequests(): array
    {
        return array_map(function ($transaction) {
            return $transaction['request'];
        }, $this->container);
    }

    /**
     * Clear the request history.
     */
    public function clearHistory(): void
    {
        $this->container = [];
    }
}
