<?php

namespace Sedo\SedoTMP\Api\Platform;

use GuzzleHttp\Client;
use Sedo\SedoTMP\Auth\AuthenticatorInterface;
use Sedo\SedoTMP\Exception\ProblemResponseException;
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
        $this->config = new Configuration();
        $this->config->setAccessToken($authenticator->getAccessToken());

        if ($apiHost) {
            $this->config->setHost($apiHost);
        } elseif (isset($_ENV['API_HOST']) && is_string($_ENV['API_HOST'])) {
            $this->config->setHost(sprintf('%s/content/v1', $_ENV['API_HOST']));
        }

        $client = $client ?? new Client();

        // Initialize API clients
        $this->platformCampaignsApi = new ContentCampaignsApi($client, $this->config);
    }

    /**
     * @return array<array-key, ContentCampaignResponse>
     */
    public function getContentCampaigns(?Pageable $page = null, ?string $term = null, string $contentType = 'application/json'): array
    {
        $response = $this->platformCampaignsApi->contentCampaignsGet($page, $term, $contentType);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getContentCampaign(string $id): ContentCampaignResponse
    {
        $response = $this->platformCampaignsApi->contentCampaignsIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function createContentCampaign(ContentCampaignsPostRequest $contentCampaign): ContentCampaignResponse
    {
        $response = $this->platformCampaignsApi->contentCampaignsPost($contentCampaign);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }
}
