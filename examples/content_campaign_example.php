<?php

/**
 * Content Campaign Example.
 *
 * This example demonstrates how to:
 * 1. List content categories using GET `/categories`
 * 2. Create a content campaign with POST `/content-campaigns` with a publish domain and article
 * 3. Get details of the created campaign using GET `/content-campaigns/{{id}}`
 *
 * This example uses the SedoTMPClient to access the API services
 */

require_once __DIR__.'/../vendor/autoload.php';

use Sedo\SedoTMP\OpenApi\ApiException;
use Sedo\SedoTMP\OpenApi\Platform\Model\ArticleDataFeaturedImage;
use Sedo\SedoTMP\OpenApi\Platform\Model\CampaignDataTrackingData;
use Sedo\SedoTMP\OpenApi\Platform\Model\CampaignDataTrackingDataTrackingSettings;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\OpenApi\Platform\Model\Postback;
use Sedo\SedoTMP\SedoTMPClient;

// Initialize the SedoTMP client with the path to the .env file
$client = new SedoTMPClient(__DIR__.'/../.env');

// Get the API services from the client
$contentApiService = $client->content();
$platformApiService = $client->platform();

try {
    // Enable debug mode for detailed API request/response logging
    $client->getAuthenticator()->getConfig()->setDebug(true);

    // Step 1: List content categories
    echo "Step 1: Listing content categories\n";
    echo "===================================\n";

    $categories = $contentApiService->getCategories();

    if (0 === count($categories)) {
        throw new Exception('No categories found. Please create a category first.');
    }

    echo sprintf("Found %d categories:\n", count($categories));
    foreach ($categories as $category) {
        echo sprintf("- ID: %s, Name: %s\n", $category->getId(), $category->getTitle());
    }

    $categoryId = $categories[0]->getId();
    $categoryExists = false;

    // Step 2: Create a content campaign
    echo "Step 2: Creating a content campaign\n";
    echo "===================================\n";

    // Create an article
    $article = new ContentCampaignsPostRequestArticle();
    $article->setType('CreateArticle');
    $article->setTitle('Summer vacation');
    $article->setExcerpt('The best summer vacation deals');
    $article->setTopics([
        'Summer vacation',
        'All inclusive resort in Thailand',
        'Cheap flights from USA',
    ]);
    $article->setCategoryId($categoryId); // Using specific category ID

    // Set country and locale directly with string values
    $article->setCountry('US');
    $article->setLocale('en-US');

    // Set featured image to be generated
    $featuredImage = new ArticleDataFeaturedImage();
    $featuredImage->setGenerate(true);
    $article->setFeaturedImage($featuredImage);

    // Create a campaign
    $campaign = new ContentCampaignsPostRequestCampaign();
    $campaign->setType('CreateCampaign');
    $campaign->setName('summer vacation');

    // Set up tracking data
    $trackingData = new CampaignDataTrackingData();
    $trackingData->setTrafficSource('META');
    $trackingData->setTrackingMethod('S2S');

    // Set up tracking settings
    $trackingSettings = new CampaignDataTrackingDataTrackingSettings();
    $trackingSettings->setType('S2sMetaTrackingSettings');
    $trackingSettings->setS2sMetaToken('string');
    $trackingSettings->setS2sMetaPixelId('string');
    $trackingSettings->setS2sMetaLandingPageEvent('string');
    $trackingSettings->setS2sMetaClickEvent('string');
    $trackingSettings->setS2sMetaSearchEvent('string');
    $trackingData->setTrackingSettings($trackingSettings);

    // Set up postbacks
    $postback = new Postback();
    $postback->setEventName('CLICK');
    $postback->setUrl('https://your-tracking-url.com/cf/cv?click_id={click_id}&payout={epayout}');
    $postback->setClickIdParam('click_id');
    $trackingData->setPostbacks([$postback]);

    $campaign->setTrackingData($trackingData);

    // Create the content campaign request body
    $contentCampaignBody = new ContentCampaignsPostRequest();
    $contentCampaignBody->setPublishDomainName('myDomain.info'); // Using the domain from the JSON example
    $contentCampaignBody->setArticle($article);
    $contentCampaignBody->setCampaign($campaign);

    // Debug: Check the serialized request body
    //    echo "\nRequest Body (JSON):\n";
    //    echo $contentCampaignBody->__toString();
    //    echo "\n\n";

    // Send the request to create a content campaign
    $response = $platformApiService->createContentCampaign($contentCampaignBody);

    echo "Content campaign created successfully!\n";
    echo sprintf("Campaign ID: %s\n", $response->getId());
    echo sprintf("Status: %d\n\n", $response->getStatus());

    // Store the campaign ID for the next step
    $campaignId = $response->getId();

    // Step 3: Get details of the created campaign
    echo "Step 3: Getting details of the created campaign\n";
    echo "==============================================\n";

    // Get the campaign details using the ID directly (no need for Id object with the updated API)
    $campaignDetails = $platformApiService->getContentCampaign((string) $campaignId);

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
        "Error: %s\nTrace: %s\n",
        $responseBody instanceof stdClass ? json_encode($responseBody) : $responseBody,
        $e->getTraceAsString()
    );
} catch (Exception $e) {
    echo sprintf(
        "Error: %s\nTrace: %s\n",
        $e->getMessage(),
        $e->getTraceAsString()
    );
}
