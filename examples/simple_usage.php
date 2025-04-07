<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sedo\SedoTMPClient;
use Sedo\SedoTMP\Content\Model\Pageable;

// Initialize the client with the path to the .env file
$client = new SedoTMPClient(__DIR__ . '/../.env');

try {
    // 1. Get available domains
    echo "Fetching available domains...\n";
    $domains = $client->content()->getDomains();
    
    if (count($domains) === 0) {
        echo "No domains available. Please create a domain first.\n";
        exit(1);
    }
    
    echo "Found " . count($domains) . " domains.\n";
    echo "Using domain: " . $domains[0]->getName() . "\n\n";
    
    // 2. Get available categories
    echo "Fetching available categories...\n";
    $page = new Pageable();
    $page->setPage(0);
    $page->setSize(10);
    
    $categories = $client->content()->getCategories($page);
    echo "Found " . count($categories) . " categories.\n";
    
    if (count($categories) > 0) {
        echo "First category: " . $categories[0]->getName() . " (ID: " . $categories[0]->getId() . ")\n\n";
    }
    
    // 3. Get recent articles
    echo "Fetching recent articles...\n";
    $articles = $client->content()->getArticles($page);
    echo "Found " . count($articles) . " articles.\n";
    
    if (count($articles) > 0) {
        echo "Latest article: " . $articles[0]->getTitle() . " (ID: " . $articles[0]->getId() . ")\n\n";
        
        // 4. Get content campaigns
        echo "Fetching content campaigns...\n";
        $campaigns = $client->platform()->getContentCampaigns($page);
        echo "Found " . count($campaigns) . " content campaigns.\n";
        
        if (count($campaigns) > 0) {
            echo "Latest campaign status: " . $campaigns[0]->getStatus() . "\n";
            if ($campaigns[0]->getTrackingUrl()) {
                echo "Tracking URL: " . $campaigns[0]->getTrackingUrl() . "\n";
            }
        }
    }
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
