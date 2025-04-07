<?php

namespace Sedo;

use Sedo\Api\Content\ContentApiService;
use Sedo\Api\Content\ContentApiServiceInterface;
use Sedo\Api\Platform\PlatformApiService;
use Sedo\Api\Platform\PlatformApiServiceInterface;
use Sedo\Auth\Auth0Authenticator;
use Sedo\Auth\AuthenticatorInterface;
use Symfony\Component\Dotenv\Dotenv;

class SedoTMPClient
{
    private AuthenticatorInterface $authenticator;
    private ContentApiServiceInterface $contentApi;
    private PlatformApiServiceInterface $platformApi;
    private string $apiHost;

    /**
     * Create a new SedoTMP client
     *
     * @param string|null $envPath Path to .env file (optional)
     * @param AuthenticatorInterface|null $authenticator Custom authenticator (optional)
     */
    public function __construct(string $envPath = null, AuthenticatorInterface $authenticator = null)
    {
        // Load environment variables if path provided
        if ($envPath) {
            $dotenv = new Dotenv();
            $dotenv->load($envPath);
        }
        
        // Set API host from environment or use default
        $this->apiHost = $_ENV['API_HOST'] ?? 'https://api.sedotmp.com';
        
        // Create configuration
        $config = new Configuration();
        
        // Set up authenticator
        if ($authenticator) {
            $this->authenticator = $authenticator;
        } else {
            $this->authenticator = new Auth0Authenticator($config, $envPath);
        }
        
        // Initialize API services
        $this->contentApi = new ContentApiService($this->authenticator, $this->apiHost . '/content/v1');
        $this->platformApi = new PlatformApiService($this->authenticator, $this->apiHost . '/platform/v1');
    }

    /**
     * Get the Content API service
     *
     * @return ContentApiServiceInterface
     */
    public function content(): ContentApiServiceInterface
    {
        return $this->contentApi;
    }

    /**
     * Get the Platform API service
     *
     * @return PlatformApiServiceInterface
     */
    public function platform(): PlatformApiServiceInterface
    {
        return $this->platformApi;
    }

    /**
     * Get the authenticator
     *
     * @return AuthenticatorInterface
     */
    public function getAuthenticator(): AuthenticatorInterface
    {
        return $this->authenticator;
    }
}
