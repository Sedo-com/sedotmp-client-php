<?php

namespace Sedo\SedoTMP\Auth;

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Sedo\SedoTMP\OpenApi\Configuration;
use Symfony\Component\Dotenv\Dotenv;

class Auth0Authenticator implements AuthenticatorInterface
{
    private Auth0 $auth0;
    private ?string $accessToken = null;
    private ?int $expiresAt = null;
    private Configuration $config;

    public function __construct(Configuration $config, ?string $envPath = null)
    {
        $this->config = $config;

        if ($envPath) {
            $this->loadEnv($envPath);
        }

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
            'domain' => $_ENV['AUTH0_DOMAIN'],
            'clientId' => $_ENV['AUTH0_CLIENT_ID'],
            'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
            'audience' => [$_ENV['AUTH0_AUDIENCE']],
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

        return $this->accessToken;
    }

    private function refreshToken(): void
    {
        try {
            $response = $this->auth0->authentication()->clientCredentials([
                'audience' => $_ENV['AUTH0_AUDIENCE'],
            ]);

            if (200 !== $response->getStatusCode()) {
                throw new \RuntimeException(sprintf('Invalid token response from Auth0 with status [%s]: %s', $response->getStatusCode(), $response->getBody()->__toString()));
            }

            // The response is a PSR-7 Response object, we need to decode the JSON body
            $body = $response->getBody()->__toString();
            $tokenData = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

            if (!isset($tokenData['access_token']) || !isset($tokenData['expires_in'])) {
                throw new \RuntimeException(sprintf('Invalid token response from Auth0: %s', $body));
            }

            $this->accessToken = $tokenData['access_token'];
            $this->expiresAt = time() + $tokenData['expires_in'] - 60; // Subtract 60 seconds for safety margin

            // Update the configuration with the new token
            $this->config->setAccessToken($this->accessToken);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // Handle connection errors (like DNS resolution failures)
            $message = $e->getMessage();
            $domain = $_ENV['AUTH0_DOMAIN'] ?? 'unknown';

            if (false !== strpos($message, 'Unknown host')) {
                throw new \RuntimeException(sprintf('Could not connect to Auth0 domain: %s. Please check your AUTH0_DOMAIN setting in the .env file and ensure it\'s correct. If you\'re using example values, you need to replace them with your actual Auth0 credentials.', $domain));
            }

            throw new \RuntimeException(sprintf('Connection error to Auth0: %s', $message), 0, $e);
        } catch (\JsonException $e) {
            throw new \RuntimeException(sprintf('Failed to parse Auth0 response: %s', $e->getMessage()), 0, $e);
        }
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
