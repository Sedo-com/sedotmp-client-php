<?php

namespace Sedo\SedoTMP\Api\Platform;

use GuzzleHttp\Client;
use Sedo\SedoTMP\Auth\AuthenticatorInterface;
use Sedo\SedoTMP\OpenApi\Configuration;
use Sedo\SedoTMP\OpenApi\Platform\API\ContentCampaignsApi;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Platform\Model\Problem;

class PlatformApiService implements PlatformApiServiceInterface
{
    private Configuration $config;
    private ContentCampaignsApi $platformCampaignsApi;

    public function __construct(AuthenticatorInterface $authenticator, ?string $apiHost = null, ?Client $client = null)
    {
        // Initialize configuration
        $this->config = new Configuration();

        if ($apiHost) {
            $this->config->setHost($apiHost);
        } elseif (isset($_ENV['API_HOST']) && is_string($_ENV['API_HOST'])) {
            $this->config->setHost(sprintf('%s/content/v1', $_ENV['API_HOST']));
        }

        // Set access token from authenticator
        $this->config->setAccessToken($authenticator->getAccessToken());

        $client = $client ?? new Client();

        // Initialize API clients
        $this->platformCampaignsApi = new ContentCampaignsApi($client, $this->config);
    }

    /**
     * @return array<array-key, ContentCampaignResponse>|Problem
     */
    public function getContentCampaigns(?Pageable $page = null, ?string $term = null, string $contentType = 'application/json'): array|Problem
    {
        return $this->platformCampaignsApi->contentCampaignsGet($page, $term, $contentType);
    }

    public function getContentCampaign(string $id): ContentCampaignResponse|Problem
    {
        return $this->platformCampaignsApi->contentCampaignsIdGet($id);
    }

    public function createContentCampaign(ContentCampaignsPostRequest $contentCampaign): ContentCampaignResponse|Problem
    {
        return $this->platformCampaignsApi->contentCampaignsPost($contentCampaign);
    }

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
