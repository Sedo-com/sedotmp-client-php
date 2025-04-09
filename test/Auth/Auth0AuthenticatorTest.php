<?php

namespace Sedo\Test\Auth;

use PHPUnit\Framework\TestCase;
use Sedo\SedoTMP\Auth\Auth0Authenticator;
use Sedo\SedoTMP\OpenApi\Configuration;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class Auth0AuthenticatorTest extends TestCase
{
    /**
     * Tests if the __construct method initializes the Auth0Authenticator correctly with valid environment variables.
     */
    public function testConstructorWithValidEnvironmentVariables(): void
    {
        $_ENV['AUTH0_AUDIENCE'] = 'test-audience';
        $_ENV['AUTH0_DOMAIN'] = 'test-domain.com';
        $_ENV['AUTH0_CLIENT_ID'] = 'test-client-id';
        $_ENV['AUTH0_CLIENT_SECRET'] = 'test-client-secret';

        $cacheMock = $this->createMock(AdapterInterface::class);

        $authenticator = new Auth0Authenticator($cacheMock);

        $this->assertInstanceOf(Auth0Authenticator::class, $authenticator);
    }

    /**
     * Tests if the __construct method throws an exception when AUTH0_AUDIENCE environment variable is missing.
     */
    public function testConstructorThrowsExceptionForMissingAuth0Audience(): void
    {
        $_ENV['AUTH0_DOMAIN'] = 'test-domain.com';
        $_ENV['AUTH0_CLIENT_ID'] = 'test-client-id';
        $_ENV['AUTH0_CLIENT_SECRET'] = 'test-client-secret';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AUTH0_AUDIENCE environment variable is missing. Please check your .env file.');

        $cacheMock = $this->createMock(AdapterInterface::class);

        new Auth0Authenticator($cacheMock);
    }

    /**
     * Tests if the __construct method throws an exception when AUTH0_DOMAIN environment variable is missing.
     */
    public function testConstructorThrowsExceptionForMissingAuth0Domain(): void
    {
        $_ENV['AUTH0_AUDIENCE'] = 'test-audience';
        $_ENV['AUTH0_CLIENT_ID'] = 'test-client-id';
        $_ENV['AUTH0_CLIENT_SECRET'] = 'test-client-secret';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AUTH0_DOMAIN environment variable is missing. Please check your .env file.');

        $cacheMock = $this->createMock(AdapterInterface::class);

        new Auth0Authenticator($cacheMock);
    }

    /**
     * Tests if the __construct method throws an exception when AUTH0_CLIENT_ID environment variable is missing.
     */
    public function testConstructorThrowsExceptionForMissingAuth0ClientId(): void
    {
        $_ENV['AUTH0_AUDIENCE'] = 'test-audience';
        $_ENV['AUTH0_DOMAIN'] = 'test-domain.com';
        $_ENV['AUTH0_CLIENT_SECRET'] = 'test-client-secret';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AUTH0_CLIENT_ID environment variable is missing. Please check your .env file.');

        $cacheMock = $this->createMock(AdapterInterface::class);

        new Auth0Authenticator($cacheMock);
    }

    /**
     * Tests if the __construct method throws an exception when AUTH0_CLIENT_SECRET environment variable is missing.
     */
    public function testConstructorThrowsExceptionForMissingAuth0ClientSecret(): void
    {
        $_ENV['AUTH0_AUDIENCE'] = 'test-audience';
        $_ENV['AUTH0_DOMAIN'] = 'test-domain.com';
        $_ENV['AUTH0_CLIENT_ID'] = 'test-client-id';

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('AUTH0_CLIENT_SECRET environment variable is missing. Please check your .env file.');

        $cacheMock = $this->createMock(AdapterInterface::class);

        new Auth0Authenticator($cacheMock);
    }

    /**
     * Tests if the __construct method works correctly when cache is not provided.
     */
    public function testConstructorWithNullCache(): void
    {
        $_ENV['AUTH0_AUDIENCE'] = 'test-audience';
        $_ENV['AUTH0_DOMAIN'] = 'test-domain.com';
        $_ENV['AUTH0_CLIENT_ID'] = 'test-client-id';
        $_ENV['AUTH0_CLIENT_SECRET'] = 'test-client-secret';

        $configMock = $this->createMock(Configuration::class);

        $authenticator = new Auth0Authenticator(null);

        $this->assertInstanceOf(Auth0Authenticator::class, $authenticator);
    }
}
