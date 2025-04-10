<?php

/**
 * SedoTMP API Basic Usage Examples.
 *
 * This example demonstrates how to:
 * 1. List and create articles using the Content API
 * 2. Generate articles with AI using the Content API
 * 3. Create content campaigns using the Platform API
 * 4. Retrieve domain information
 *
 * This example uses the SedoTMPClient to access the API services
 */

require_once __DIR__.'/../vendor/autoload.php';

use Sedo\SedoTMP\OpenApi\ApiException;
use Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\SedoTMPClient;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

// Create a cache adapter using the system's temporary directory to re-use the access-token
$cacheDir = sys_get_temp_dir().'/sedotmp-cache';
$cache = new FilesystemAdapter('auth0_tokens', 0, $cacheDir);

// Initialize the SedoTMP client with the path to the .env file and the cache adapter
$client = new SedoTMPClient(__DIR__.'/../.env', null, $cache);

// Output cache directory for reference
echo "Using cache directory: {$cacheDir}\n\n";

// Get the API services from the client
$contentApiService = $client->content();
$platformApiService = $client->platform();

try {
    // Step 1: Content API - Get a list of articles
    echo "Step 1: Listing articles\n";
    echo "======================\n";

    $page = new Pageable();
    $page->setPage(0);
    $page->setSize(10);

    $articles = $contentApiService->getArticles($page);
    echo sprintf("Found %d articles\n", count($articles));

    if (count($articles) > 0) {
        echo sprintf("First article: %s (ID: %s)\n",
            $articles[0]->getTitle(),
            $articles[0]->getId()
        );
    }

    // Step 2: Content API - Generate an article with AI
    echo "\nStep 2: Generating an article with AI\n";
    echo "==================================\n";

    $generateArticle = new GenerateArticle();
    $generateArticle->setTitle('Artificial Intelligence in Modern Business');
    $generateArticle->setLocale('en-US');
    $generateArticle->setTopics(['AI', 'Business']);

    $generatedArticle = $contentApiService->generateArticle($generateArticle, true);
    echo sprintf("Article generation initiated!\n");
    echo sprintf("Generation ID: %s\n", $generatedArticle->getId());
    echo "Note: Article generation is asynchronous and may take some time to complete.\n";

    // Step 3: Platform API - Create a content campaign
    echo "\nStep 3: Creating a content campaign\n";
    echo "=================================\n";

    // Use the newly created article for the campaign
    $campaignArticle = new ContentCampaignsPostRequestArticle();
    $campaignArticle->setType('ExistingArticle');

    // Create a new campaign
    $createCampaign = new ContentCampaignsPostRequestCampaign();
    $createCampaign->setType('CreateCampaign');
    $createCampaign->setName('Example Campaign');

    // Get available domains
    $domains = $contentApiService->getDomains();
    if (0 === count($domains)) {
        echo "No domains available. Using example-domain.info instead.\n";
        $domainName = 'example-domain.info';
    } else {
        $domainName = $domains[0]->getDomain();
        echo sprintf("Using domain: %s\n", $domainName);
    }

    // Create the content campaign request body
    $contentCampaign = new ContentCampaignsPostRequest();
    $contentCampaign->setPublishDomainName((string) $domainName);
    $contentCampaign->setArticle($campaignArticle);
    $contentCampaign->setCampaign($createCampaign);

    $campaign = $platformApiService->createContentCampaign($contentCampaign);
    echo "Content campaign created successfully!\n";
    echo sprintf("Campaign ID: %s\n", $campaign->getId());
    echo sprintf("Status: %d\n", $campaign->getStatus());

    // Step 4: Platform API - Get content campaign details
    echo "\nStep 4: Getting campaign details\n";
    echo "===============================\n";

    $campaignDetails = $platformApiService->getContentCampaign((string) $campaign->getId());

    echo "Campaign Details:\n";
    echo sprintf("- ID: %s\n", $campaignDetails->getId());
    echo sprintf("- Status: %d\n", $campaignDetails->getStatus());
    echo sprintf("- Created At: %s\n", $campaignDetails->getCreatedDate()?->format(DateTimeInterface::ATOM));

    // Display article details if available
    if ($campaignDetails->getArticle()) {
        $article = $campaignDetails->getArticle();
        echo sprintf(
            "\nArticle Details:\n- ID: %s\n- Title: %s\n- Excerpt: %s\n",
            $article->getId(),
            $article->getTitle(),
            $article->getExcerpt()
        );
    }

    // Display campaign details if available
    if ($campaignDetails->getCampaign()) {
        $campaign = $campaignDetails->getCampaign();
        echo sprintf(
            "\nCampaign Details:\n- ID: %s\n- Name: %s\n",
            $campaign->getId(),
            $campaign->getName()
        );
    }
} catch (ApiException $e) {
    $responseBody = $e->getResponseBody();
    echo sprintf(
        "ApiException: %s\nTrace: %s\n",
        $responseBody instanceof stdClass ? json_encode($responseBody) : $responseBody,
        $e->getTraceAsString()
    );
} catch (Exception $e) {
    echo sprintf(
        "Exception: %s\nTrace: %s\n",
        $e->getMessage(),
        $e->getTraceAsString()
    );
}
