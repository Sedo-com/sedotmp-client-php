<?php

namespace Sedo\Api\Platform;

use GuzzleHttp\Client;
use Sedo\Auth\AuthenticatorInterface;
use Sedo\Configuration;
use Sedo\SedoTMP\Platform\API\ContentCampaignsApi;
use Sedo\SedoTMP\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\Platform\Model\Pageable;

class PlatformApiService implements PlatformApiServiceInterface
{
    private Configuration $config;
    private ContentCampaignsApi $contentCampaignsApi;

    public function __construct(AuthenticatorInterface $authenticator, ?string $apiHost = null, ?Client $client = null)
    {
        // Initialize configuration
        $this->config = new Configuration();

        if ($apiHost) {
            $this->config->setHost($apiHost);
        } elseif (isset($_ENV['API_HOST'])) {
            $this->config->setHost($_ENV['API_HOST'].'/platform/v1');
        }

        // Set access token from authenticator
        $this->config->setAccessToken($authenticator->getAccessToken());

        $client = $client ?? new Client();

        // Initialize API clients
        $this->contentCampaignsApi = new ContentCampaignsApi($client, $this->config);
    }

    public function getContentCampaigns(?Pageable $page = null, ?string $term = null): array
    {
        return $this->contentCampaignsApi->contentCampaignsGet($page, $term);
    }

    public function getContentCampaign(string $id): ContentCampaignResponse
    {
        return $this->contentCampaignsApi->contentCampaignsIdGet($id);
    }

    public function createContentCampaign(ContentCampaignsPostRequest $contentCampaign): ContentCampaignResponse
    {
        return $this->contentCampaignsApi->contentCampaignsPost($contentCampaign);
    }

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
