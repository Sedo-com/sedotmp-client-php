<?php

namespace Sedo\Api\Platform;

use Sedo\Configuration;
use Sedo\SedoTMP\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\Platform\Model\Pageable;

interface PlatformApiServiceInterface
{
    /**
     * Get a list of content campaigns.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return ContentCampaignResponse[]
     */
    public function getContentCampaigns(?Pageable $page = null, ?string $term = null): array;

    /**
     * Get a content campaign by ID.
     *
     * @param string $id Content campaign ID
     */
    public function getContentCampaign(string $id): ContentCampaignResponse;

    /**
     * Create a new content campaign.
     *
     * @param ContentCampaignsPostRequest $contentCampaign Content campaign data
     */
    public function createContentCampaign(ContentCampaignsPostRequest $contentCampaign): ContentCampaignResponse;

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration;
}
