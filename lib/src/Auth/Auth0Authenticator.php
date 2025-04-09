<?php

namespace Sedo\SedoTMP\Auth;

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Sedo\SedoTMP\Exception\UnexpectedTypeException;
use Sedo\SedoTMP\OpenApi\Configuration;
use Symfony\Component\Dotenv\Dotenv;

class Auth0Authenticator implements AuthenticatorInterface
{
    private Auth0 $auth0;
    private ?string $accessToken = null;
    private ?int $expiresAt = null;
    private Configuration $config;

    private string $auth0Domain;
    private string $auth0Audience;
    private string $auth0ClientId;
    private string $auth0ClientSecret;

    public function __construct(Configuration $config, ?string $envPath = null)
    {
        $this->config = $config;

        if ($envPath) {
            $this->loadEnv($envPath);
        }

        if (!isset($_ENV['AUTH0_AUDIENCE']) || !is_string($_ENV['AUTH0_AUDIENCE'])) {
            throw new \RuntimeException('AUTH0_AUDIENCE environment variable is missing. Please check your .env file.');
        }
        if (!isset($_ENV['AUTH0_DOMAIN']) || !is_string($_ENV['AUTH0_DOMAIN'])) {
            throw new \RuntimeException('AUTH0_DOMAIN environment variable is missing. Please check your .env file.');
        }
        if (!isset($_ENV['AUTH0_CLIENT_ID']) || !is_string($_ENV['AUTH0_CLIENT_ID'])) {
            throw new \RuntimeException('AUTH0_CLIENT_ID environment variable is missing. Please check your .env file.');
        }
        if (!isset($_ENV['AUTH0_CLIENT_SECRET']) || !is_string($_ENV['AUTH0_CLIENT_SECRET'])) {
            throw new \RuntimeException('AUTH0_CLIENT_SECRET environment variable is missing. Please check your .env file.');
        }
        $this->auth0Audience = $_ENV['AUTH0_AUDIENCE'];
        $this->auth0Domain = $_ENV['AUTH0_DOMAIN'];
        $this->auth0ClientId = $_ENV['AUTH0_CLIENT_ID'];
        $this->auth0ClientSecret = $_ENV['AUTH0_CLIENT_SECRET'];

        $this->initializeAuth0();
    }

    private function loadEnv(string $envPath): void
    {
        $dotenv = new Dotenv();
        $dotenv->load($envPath);
    }

    private function initializeAuth0(): void
    {
        $configuration = new SdkConfiguration([
            'strategy' => SdkConfiguration::STRATEGY_API,
            'domain' => $this->auth0Domain,
            'clientId' => $this->auth0ClientId,
            'clientSecret' => $this->auth0ClientSecret,
            'audience' => $this->auth0Audience,
            'cookieSecret' => 'not-used-for-client-credentials-flow',
            'cookieSecure' => false,
            'cookieDomain' => null,
            'cookiePath' => '/',
            'cookieExpires' => 0,
            'tokenAlgorithm' => 'RS256',
            'usePkce' => false,
        ]);

        $this->auth0 = new Auth0($configuration);
    }

    public function getAccessToken(): string
    {
        if (null !== $this->accessToken && $this->expiresAt > time()) {
            return $this->accessToken;
        }

        $this->refreshToken();

        if (null === $this->accessToken) {
            throw UnexpectedTypeException::fromMixed($this->accessToken, ['string']);
        }

        return $this->accessToken;
    }

    private function refreshToken(): void
    {
        try {
            $response = $this->auth0->authentication()->clientCredentials([
                'audience' => $this->auth0Audience,
            ]);

            if (200 !== $response->getStatusCode()) {
                throw new \RuntimeException(sprintf('Invalid token response from Auth0 with status [%s]: %s', $response->getStatusCode(), $response->getBody()->__toString()));
            }

            // The response is a PSR-7 Response object, we need to decode the JSON body
            $tokenData = self::extractTokenData($response->getBody()->__toString());

            $this->accessToken = $tokenData['access_token'];
            $this->expiresAt = time() + $tokenData['expires_in'] - 60; // Subtract 60 seconds for safety margin

            // Update the configuration with the new token
            $this->config->setAccessToken($this->accessToken);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // Handle connection errors (like DNS resolution failures)
            $message = $e->getMessage();

            if (false !== strpos($message, 'Unknown host')) {
                throw new \RuntimeException(sprintf('Could not connect to Auth0 domain: %s. Please check your AUTH0_DOMAIN setting in the .env file and ensure it\'s correct. If you\'re using example values, you need to replace them with your actual Auth0 credentials.', $this->auth0Domain));
            }

            throw new \RuntimeException(sprintf('Connection error to Auth0: %s', $message), 0, $e);
        } catch (\JsonException $e) {
            throw new \RuntimeException(sprintf('Failed to parse Auth0 response: %s', $e->getMessage()), 0, $e);
        }
    }

    /**
     * @return array{access_token: string, expires_in: int}
     */
    private static function extractTokenData(string $body): array
    {
        try {
            $tokenData = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw UnexpectedTypeException::fromJsonException($e);
        }

        if (!is_array($tokenData)) {
            throw UnexpectedTypeException::fromInvalidToken($tokenData);
        }
        if (!isset($tokenData['access_token']) || !isset($tokenData['expires_in'])) {
            throw UnexpectedTypeException::fromInvalidToken($tokenData);
        }
        if (!is_string($tokenData['access_token']) || !is_int($tokenData['expires_in'])) {
            throw UnexpectedTypeException::fromInvalidToken($tokenData);
        }

        return [
            'access_token' => $tokenData['access_token'],
            'expires_in' => $tokenData['expires_in'],
        ];
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
