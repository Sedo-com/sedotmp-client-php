<?php

/**
 * SedoTMP API Simple Usage Example.
 *
 * This example demonstrates basic usage of the SedoTMP API:
 * 1. Retrieving available domains
 * 2. Listing content categories
 * 3. Fetching recent articles
 * 4. Getting content campaigns
 *
 * This example uses the SedoTMPClient to access the API services
 */

require_once __DIR__.'/../vendor/autoload.php';

use Sedo\SedoTMP\OpenApi\ApiException;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable as ContentPageable;
use Sedo\SedoTMP\OpenApi\Platform\Model\Pageable as PlatformPageable;
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

try {
    // Step 1: Get available domains
    echo "Step 1: Listing available domains\n";
    echo "===============================\n";

    $domains = $contentApiService->getDomains();

    if (0 === count($domains)) {
        echo "No domains available. Please create a domain first.\n";
        exit(1);
    }

    echo sprintf("Found %d domains\n", count($domains));
    echo sprintf("First domain: %s\n", $domains[0]->getDomain());

    // Step 2: Get available categories
    echo "\nStep 2: Listing content categories\n";
    echo "================================\n";

    $page = new ContentPageable();
    $page->setPage(0);
    $page->setSize(10);

    $categories = $contentApiService->getCategories($page);
    echo sprintf("Found %d categories\n", count($categories));

    if (count($categories) > 0) {
        echo sprintf("First category: %s (ID: %s)\n",
            $categories[0]->getTitle(),
            $categories[0]->getId()
        );
    }

    // Step 3: Get recent articles
    echo "\nStep 3: Listing recent articles\n";
    echo "==============================\n";

    $articles = $contentApiService->getArticles($page);
    echo sprintf("Found %d articles\n", count($articles));

    if (count($articles) > 0) {
        echo sprintf("Latest article: %s (ID: %s)\n",
            $articles[0]->getTitle(),
            $articles[0]->getId()
        );

        // Display article details
        echo "\nArticle Details:\n";
        echo sprintf("- Title: %s\n", $articles[0]->getTitle());
        echo sprintf("- ID: %s\n", $articles[0]->getId());
        if ($articles[0]->getExcerpt()) {
            echo sprintf("- Excerpt: %s\n", $articles[0]->getExcerpt());
        }
        if ($articles[0]->getCreatedDate()) {
            echo sprintf("- Created At: %s\n", $articles[0]->getCreatedDate()->format(DateTimeInterface::ATOM));
        }

        // Step 4: Get content campaigns
        echo "\nStep 4: Listing content campaigns\n";
        echo "================================\n";

        $page = new PlatformPageable();
        $page->setPage(0);
        $page->setSize(10);

        $campaigns = $platformApiService->getContentCampaigns($page);
        echo sprintf("Found %d content campaigns\n", count($campaigns));

        if (count($campaigns) > 0) {
            echo "\nLatest Campaign Details:\n";
            echo sprintf("- ID: %s\n", $campaigns[0]->getId());
            echo sprintf("- Status: %d\n", $campaigns[0]->getStatus());
            if ($campaigns[0]->getCreatedDate()) {
                echo sprintf("- Created At: %s\n", $campaigns[0]->getCreatedDate()->format(DateTimeInterface::ATOM));
            }
            if ($campaigns[0]->getTrackingUrl()) {
                echo sprintf("- Tracking URL: %s\n", $campaigns[0]->getTrackingUrl());
            }
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
