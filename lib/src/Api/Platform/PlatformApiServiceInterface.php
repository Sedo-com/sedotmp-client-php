<?php

namespace Sedo\SedoTMP\Api\Platform;

use Sedo\SedoTMP\OpenApi\Configuration;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Platform\Model\Problem;

interface PlatformApiServiceInterface
{
    /**
     * Get a list of content campaigns.
     *
     * @param Pageable|null $page        Pagination parameters
     * @param string|null   $term        Search term
     * @param string        $contentType the requested content-type
     *
     * @return array<array-key, ContentCampaignResponse>|Problem
     */
    public function getContentCampaigns(?Pageable $page = null, ?string $term = null, string $contentType = 'application/json'): array|Problem;

    /**
     * Get a content campaign by ID.
     *
     * @param string $id Content campaign ID
     */
    public function getContentCampaign(string $id): ContentCampaignResponse|Problem;

    /**
     * Create a new content campaign.
     *
     * @param ContentCampaignsPostRequest $contentCampaign Content campaign data
     */
    public function createContentCampaign(ContentCampaignsPostRequest $contentCampaign): ContentCampaignResponse|Problem;

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration;
}
