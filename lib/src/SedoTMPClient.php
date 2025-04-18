<?php

namespace Sedo\SedoTMP;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Sedo\SedoTMP\Api\Content\ContentApiService;
use Sedo\SedoTMP\Api\Content\ContentApiServiceInterface;
use Sedo\SedoTMP\Api\Platform\PlatformApiService;
use Sedo\SedoTMP\Api\Platform\PlatformApiServiceInterface;
use Sedo\SedoTMP\Auth\Auth0Authenticator;
use Sedo\SedoTMP\Auth\AuthenticatorInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Dotenv\Dotenv;

class SedoTMPClient
{
    private AuthenticatorInterface $authenticator;
    private ContentApiServiceInterface $contentApi;
    private PlatformApiServiceInterface $platformApi;
    private string $apiHost;

    /**
     * Create a new SedoTMP client.
     *
     * @param string                      $envPath       Path to .env file (optional)
     * @param AuthenticatorInterface|null $authenticator Custom authenticator (optional)
     * @param AdapterInterface|null       $cache         Cache adapter for authentication tokens (optional)
     */
    public function __construct(string $envPath, ?AuthenticatorInterface $authenticator = null, ?AdapterInterface $cache = null)
    {
        $this->loadEnv($envPath);

        if (!isset($_ENV['API_HOST']) || !is_string($_ENV['API_HOST'])) {
            throw new \RuntimeException('API_HOST environment variable is missing. Please check your .env file.');
        }

        $this->apiHost = $_ENV['API_HOST'];

        // Ensure required environment variables are set
        if (!isset($_ENV['AUTH0_DOMAIN'], $_ENV['AUTH0_CLIENT_ID'], $_ENV['AUTH0_CLIENT_SECRET'])) {
            throw new \RuntimeException('Required Auth0 environment variables are missing. Please check your .env file.');
        }

        // Set up authenticator
        if ($authenticator instanceof AuthenticatorInterface) {
            $this->authenticator = $authenticator;
            // If the authenticator is an Auth0Authenticator and cache is provided, set it
            if (null !== $cache) {
                $this->authenticator->setCache($cache);
            }
        } else {
            $this->authenticator = new Auth0Authenticator($cache);
        }

        $this->authenticator->getAccessToken();

        $client = $this->buildClient();

        // Initialize API services
        $this->contentApi = new ContentApiService($this->authenticator, $this->apiHost.'/content/v1', $client);
        $this->platformApi = new PlatformApiService($this->authenticator, $this->apiHost.'/platform/v1', $client);
    }

    private function loadEnv(string $envPath): void
    {
        if (!file_exists($envPath)) {
            throw new \RuntimeException("Environment file not found: {$envPath}");
        }
        $dotenv = new Dotenv();
        $dotenv->load($envPath);
    }

    private function buildClient(): Client
    {
        $stack = HandlerStack::create();

        if (
            class_exists(\Monolog\Logger::class)
            && class_exists(\Monolog\Handler\StreamHandler::class)
            && 'true' === $_ENV['DEBUG']
        ) {
            $logger = new \Monolog\Logger('guzzleLogger');
            $logger->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__.'../../../debug.log', \Monolog\Level::Debug));

            $messageFormat = "{method} {uri} HTTP/{version}\nREQUEST HEADERS: {req_headers}\nREQUEST BODY:\n{req_body}\n\nRESPONSE STATUS: {code}\nRESPONSE HEADERS: {res_headers}\nRESPONSE BODY:\n{res_body}\n";

            $stack->push(Middleware::log(
                $logger,
                new MessageFormatter($messageFormat)
            ));
        }

        return new Client(['handler' => $stack]);
    }

    /**
     * Get the Content API service.
     */
    public function content(): ContentApiServiceInterface
    {
        return $this->contentApi;
    }

    /**
     * Get the Platform API service.
     */
    public function platform(): PlatformApiServiceInterface
    {
        return $this->platformApi;
    }

    /**
     * Get the authenticator.
     */
    public function getAuthenticator(): AuthenticatorInterface
    {
        return $this->authenticator;
    }
}
