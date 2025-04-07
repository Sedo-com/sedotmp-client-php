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
        $configuration = new SdkConfiguration([
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
            'usePkce' => false
        ]);

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
        try {
            $response = $this->auth0->authentication()->clientCredentials([
                'audience' => $_ENV['AUTH0_AUDIENCE'],
            ]);
            
            // The response is a PSR-7 Response object, we need to decode the JSON body
            $body = $response->getBody()->__toString();
            $tokenData = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            
            if (!isset($tokenData['access_token']) || !isset($tokenData['expires_in'])) {
                throw new \RuntimeException('Invalid token response from Auth0: ' . $body);
            }
            
            $this->accessToken = $tokenData['access_token'];
            $this->expiresAt = time() + $tokenData['expires_in'] - 60; // Subtract 60 seconds for safety margin
            
            // Update the configuration with the new token
            $this->config->setAccessToken($this->accessToken);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            // Handle connection errors (like DNS resolution failures)
            $message = $e->getMessage();
            $domain = $_ENV['AUTH0_DOMAIN'] ?? 'unknown';
            
            if (strpos($message, 'Unknown host') !== false) {
                throw new \RuntimeException(
                    "Could not connect to Auth0 domain: {$domain}. " .
                    "Please check your AUTH0_DOMAIN setting in the .env file and ensure it's correct. " .
                    "If you're using example values, you need to replace them with your actual Auth0 credentials."
                );
            }
            
            throw new \RuntimeException("Connection error to Auth0: {$message}", 0, $e);
        } catch (\JsonException $e) {
            throw new \RuntimeException('Failed to parse Auth0 response: ' . $e->getMessage(), 0, $e);
        } catch (\Exception $e) {
            throw new \RuntimeException('Auth0 authentication error: ' . $e->getMessage(), 0, $e);
        }
    }
}
