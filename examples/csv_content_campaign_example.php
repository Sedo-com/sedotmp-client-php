<?php

/**
 * CSV Content Campaign Example.
 *
 * This example demonstrates how to:
 * 1. Read campaign data from a CSV file (examples/example.csv)
 * 2. Create content campaigns based on the CSV data
 * 3. Get details of the created campaigns
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
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

// Create a cache adapter using the system's temporary directory
$cacheDir = sys_get_temp_dir().'/sedotmp-cache';
$cache = new FilesystemAdapter('auth0_tokens', 0, $cacheDir);

// Initialize the SedoTMP client with the path to the .env file and the cache adapter
$client = new SedoTMPClient(__DIR__.'/../.env', null, $cache);

// Output cache directory for reference
echo "Using cache directory: {$cacheDir}\n\n";

// Get the API services from the client
$contentApiService = $client->content();
$platformApiService = $client->platform();

// Path to the CSV file
$csvFilePath = __DIR__.'/example.csv';

try {
    // Step 1: Read the CSV file
    echo "Step 1: Reading CSV file\n";
    echo "=======================\n";

    if (!file_exists($csvFilePath)) {
        throw new Exception("CSV file not found: {$csvFilePath}");
    }

    $csvData = [];
    $header = null;

    if (($handle = fopen($csvFilePath, 'r')) !== false) {
        while (($data = fgetcsv($handle, 1000, ';')) !== false) {
            if (null === $header) {
                if (in_array(null, $data, true)) {
                    throw new RuntimeException('Invalid CSV-Header: contains NULL-values');
                }
                $header = $data;
                continue;
            }
            $csvData[] = array_combine($header, $data);
        }
        fclose($handle);
    }

    if (empty($csvData)) {
        throw new Exception('No data found in CSV file or file could not be read');
    }

    echo sprintf("Successfully read %d campaigns from CSV\n", count($csvData));

    // Step 2: List content categories to get a valid category ID
    echo "\nStep 2: Listing content categories\n";
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

    // Step 3: Create content campaigns from CSV data
    echo "\nStep 3: Creating content campaigns from CSV data\n";
    echo "===============================================\n";

    $createdCampaigns = [];

    foreach ($csvData as $index => $row) {
        echo sprintf("\nProcessing campaign %d: %s\n", $index + 1, $row['name']);

        // Parse topics from CSV (they're in format """topic1"",""topic2""")
        $topicsString = $row['topics'];
        $topics = [];

        // Remove outer quotes and split by commas
        $topicsString = trim((string) $topicsString, '"');
        preg_match_all('/"([^"]+)"/', $topicsString, $matches);
        if (!empty($matches[1])) {
            $topics = $matches[1];
        }

        // Create an article
        $article = new ContentCampaignsPostRequestArticle();
        $article->setType('CreateArticle');
        $article->setTitle($row['title']);
        $article->setExcerpt($row['excerpt']);
        $article->setTopics($topics);
        $article->setCategoryId($categoryId);

        // Parse locale
        $locale = $row['locale'] ?? 'en-US';
        $country = substr($locale, 3, 2);

        $article->setCountry($country);
        $article->setLocale($locale);

        // Set featured image to be generated
        $featuredImage = new ArticleDataFeaturedImage();
        $featuredImage->setGenerate(true);
        $article->setFeaturedImage($featuredImage);

        // Create a campaign
        $campaign = new ContentCampaignsPostRequestCampaign();
        $campaign->setType('CreateCampaign');
        $campaign->setName((string) $row['name']);

        // Set up tracking data
        $trackingData = new CampaignDataTrackingData();
        $trackingData->setTrafficSource(strtoupper((string) $row['trafficSource']));
        $trackingData->setTrackingMethod(strtoupper((string) $row['trackingMethod']));

        // Set up tracking settings
        $trackingSettings = new CampaignDataTrackingDataTrackingSettings();
        $trackingSettings->setType('S2sMetaTrackingSettings');
        $trackingSettings->setS2sMetaToken($row['s2sMetaToken']);
        $trackingSettings->setS2sMetaPixelId($row['s2sMetaPixelId']);
        $trackingSettings->setS2sMetaLandingPageEvent($row['s2sMetaLandingPageEvent']);
        $trackingSettings->setS2sMetaClickEvent($row['s2sMetaClickEvent']);
        $trackingSettings->setS2sMetaSearchEvent($row['s2sMetaSearchEvent']);
        $trackingData->setTrackingSettings($trackingSettings);

        // Set up postbacks
        $postback = new Postback();
        $postback->setEventName((string) $row['postbacks EventName']);
        $postback->setUrl((string) $row['postbacksUrl']);
        $postback->setClickIdParam($row['postbacksClickIdParam']);
        $trackingData->setPostbacks([$postback]);

        $campaign->setTrackingData($trackingData);

        // Create the content campaign request body
        $contentCampaignBody = new ContentCampaignsPostRequest();
        $contentCampaignBody->setPublishDomainName((string) $row['publishDomainName']);
        $contentCampaignBody->setArticle($article);
        $contentCampaignBody->setCampaign($campaign);

        // Send the request to create a content campaign
        $response = $platformApiService->createContentCampaign($contentCampaignBody);

        echo "Content campaign created successfully!\n";
        echo sprintf("Campaign ID: %s\n", $response->getId());
        echo sprintf("Status: %d\n", $response->getStatus());

        $createdCampaigns[] = $response->getId();
    }

    // Step 4: Get details of the created campaigns
    echo "\nStep 4: Getting details of the created campaigns\n";
    echo "===============================================\n";

    foreach ($createdCampaigns as $index => $campaignId) {
        echo sprintf("\nCampaign %d (ID: %s):\n", $index + 1, $campaignId);

        // Get the campaign details
        $campaignDetails = $platformApiService->getContentCampaign((string) $campaignId);

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
