<?php

namespace Sedo\Auth;

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Auth0\SDK\Token;
use Sedo\Configuration;
use Symfony\Component\Dotenv\Dotenv;

class Auth0Authenticator implements AuthenticatorInterface
{
    private Auth0 $auth0;
    private ?string $accessToken = null;
    private ?int $expiresAt = null;
    private Configuration $config;

    public function __construct(Configuration $config, string $envPath = null)
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
        $configuration = new SdkConfiguration(
            domain: $_ENV['AUTH0_DOMAIN'],
            clientId: $_ENV['AUTH0_CLIENT_ID'],
            clientSecret: $_ENV['AUTH0_CLIENT_SECRET'],
            audience: [$_ENV['AUTH0_AUDIENCE']],
        );

        $this->auth0 = new Auth0($configuration);
    }

    public function getAccessToken(): string
    {
        if ($this->accessToken !== null && $this->expiresAt > time()) {
            return $this->accessToken;
        }

        $this->refreshToken();
        return $this->accessToken;
    }

    private function refreshToken(): void
    {
        $response = $this->auth0->authentication()->clientCredentials([
            'audience' => $_ENV['AUTH0_AUDIENCE'],
        ]);

        $this->accessToken = $response->access_token;
        $this->expiresAt = time() + $response->expires_in - 60; // Subtract 60 seconds for safety margin
        
        // Update the configuration with the new token
        $this->config->setAccessToken($this->accessToken);
    }
}
