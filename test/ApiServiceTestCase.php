<?php

namespace Sedo\Test;

use PHPUnit\Framework\TestCase;
use Sedo\SedoTMP\Auth\AuthenticatorInterface;
use Sedo\SedoTMP\OpenApi\Configuration;

/**
 * Base test case for API service tests.
 */
abstract class ApiServiceTestCase extends TestCase
{
    protected MockHttpClient $mockHttpClient;

    /**
     * @var AuthenticatorInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $mockAuthenticator;

    protected Configuration $config;

    /**
     * Set up before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->mockHttpClient = new MockHttpClient();

        // Create a mock authenticator
        $this->mockAuthenticator = $this->createMock(AuthenticatorInterface::class);
        $this->mockAuthenticator->method('getAccessToken')
            ->willReturn('mock-access-token');

        // Create a configuration
        $this->config = new Configuration();
        $this->config->setHost('https://api.example.com');
        $this->config->setAccessToken('mock-access-token');
    }

    /**
     * Create a JSON response body.
     *
     * @param array $data Response data
     *
     * @return string JSON encoded string
     */
    protected function createJsonResponse(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}
