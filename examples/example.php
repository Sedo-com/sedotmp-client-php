<?php

require_once __DIR__.'/../vendor/autoload.php';

use Sedo\SedoTMP\OpenApi\Content\Model\CreateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\SedoTMPClient;

// Initialize the client with the path to the .env file
$client = new SedoTMPClient(__DIR__.'/../.env');

try {
    // Example 1: Content API - Get a list of articles
    echo "Fetching articles...\n";
    $page = new Pageable();
    $page->setPage(0);
    $page->setSize(10);

    $articles = $client->content()->getArticles($page);
    echo 'Found '.count($articles)." articles\n";

    if (count($articles) > 0) {
        echo 'First article title: '.$articles[0]->getTitle()."\n";
    }

    // Example 2: Content API - Create a new article
    echo "\nCreating a new article...\n";
    $createArticle = new CreateArticle();
    $createArticle->setTitle('Example Article Title');
    $createArticle->setExcerpt('This is an example article excerpt.');
    $createArticle->setText('This is the main content of the example article. It contains multiple paragraphs and demonstrates how to create content using the API.');

    try {
        $newArticle = $client->content()->createArticle($createArticle);
        echo 'Article created with ID: '.$newArticle->getId()."\n";

        // Example 3: Content API - Generate an article
        echo "\nGenerating an article...\n";
        $generateArticle = new GenerateArticle();
        $generateArticle->setTopic('Artificial Intelligence in Modern Business');
        $generateArticle->setLocale('en-US');

        try {
            $generatedArticle = $client->content()->generateArticle($generateArticle, true);
            echo 'Article generation initiated with ID: '.$generatedArticle->getId()."\n";
        } catch (Exception $e) {
            echo 'Error generating article: '.$e->getMessage()."\n";
        }

        // Example 4: Platform API - Create a content campaign
        echo "\nCreating a content campaign...\n";

        // Use the article we just created
        $campaignArticle = new ContentCampaignsPostRequestArticle();
        $campaignArticle->setType('ExistingArticle');
        $campaignArticle->setArticleId($newArticle->getId());

        // Create a new campaign
        $createCampaign = new ContentCampaignsPostRequestCampaign();
        $createCampaign->setType('CreateCampaign');
        $createCampaign->setName('Example Campaign');

        // Create the content campaign request body
        $contentCampaign = new ContentCampaignsPostRequest();
        $contentCampaign->setPublishDomainName('example-domain.info');
        $contentCampaign->setArticle($campaignArticle);
        $contentCampaign->setCampaign($createCampaign);

        try {
            $campaign = $client->platform()->createContentCampaign($contentCampaign);
            echo 'Content campaign created with ID: '.$campaign->getId()."\n";

            // Example 5: Platform API - Get a content campaign by ID
            echo "\nFetching the created content campaign...\n";
            $retrievedCampaign = $client->platform()->getContentCampaign($campaign->getId());
            echo 'Content campaign status: '.$retrievedCampaign->getStatus()."\n";
        } catch (Sedo\ApiException $e) {
            echo 'Error creating content campaign: '.$e->getResponseBody()."\n";
        } catch (Exception $e) {
            echo 'Error creating content campaign: '.$e->getMessage()."\n";
        }
    } catch (Sedo\ApiException $e) {
        echo 'Error creating article: '.$e->getResponseBody()."\n";
    } catch (Exception $e) {
        echo 'Error creating article: '.$e->getMessage()."\n";
    }

    // Example 6: Content API - Get a list of domains
    echo "\nFetching domains...\n";
    $domains = $client->content()->getDomains();
    echo 'Found '.count($domains)." domains\n";

    if (count($domains) > 0) {
        echo 'First domain name: '.$domains[0]->getName()."\n";
    }
} catch (Sedo\ApiException $e) {
    echo sprintf(
        "Error: %s\nTrace: %s\n",
        $e->getResponseBody(),
        $e->getTraceAsString()
    );
} catch (Exception $e) {
    echo sprintf(
        "Error: %s\nTrace: %s\n",
        $e->getMessage(),
        $e->getTraceAsString()
    );
}
