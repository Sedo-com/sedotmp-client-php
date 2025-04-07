<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Sedo\SedoTMPClient;
use Sedo\SedoTMP\Content\Model\CreateArticle;
use Sedo\SedoTMP\Content\Model\CreateCategory;
use Sedo\SedoTMP\Content\Model\Pageable;
use Sedo\SedoTMP\Platform\Model\ContentcampaignsBody;
use Sedo\SedoTMP\Platform\Model\CreateArticle as PlatformCreateArticle;
use Sedo\SedoTMP\Platform\Model\CreateCampaign;
use Sedo\SedoTMP\Platform\Model\ExistingArticle;

/**
 * This example demonstrates a complete workflow:
 * 1. Create a category if it doesn't exist
 * 2. Create an article in that category
 * 3. Create a content campaign using that article
 * 4. Monitor the campaign status until it's completed
 */

// Initialize the client with the path to the .env file
$client = new SedoTMPClient(__DIR__ . '/../.env');

try {
    // Step 1: Find or create a category
    echo "Step 1: Finding or creating a category...\n";
    $categoryName = "Technology";
    $categoryFound = false;
    
    // Search for existing categories
    $categories = $client->content()->getCategories();
    foreach ($categories as $category) {
        if ($category->getName() === $categoryName) {
            echo "Found existing category: " . $category->getName() . " (ID: " . $category->getId() . ")\n";
            $categoryId = $category->getId();
            $categoryFound = true;
            break;
        }
    }
    
    // Create a new category if not found
    if (!$categoryFound) {
        $createCategory = new CreateCategory();
        $createCategory->setName($categoryName);
        $createCategory->setDescription("Articles about technology, software, and digital trends");
        
        $newCategory = $client->content()->createCategory($createCategory);
        $categoryId = $newCategory->getId();
        echo "Created new category: " . $newCategory->getName() . " (ID: " . $categoryId . ")\n";
    }
    
    // Step 2: Create an article in the category
    echo "\nStep 2: Creating a new article...\n";
    $createArticle = new CreateArticle();
    $createArticle->setTitle("The Future of AI in Web Development");
    $createArticle->setExcerpt("How artificial intelligence is transforming the way we build and interact with websites.");
    $createArticle->setText("
        <h2>Introduction</h2>
        <p>Artificial intelligence has made significant inroads into numerous industries, and web development is no exception. From automated testing to intelligent design assistance, AI is revolutionizing how developers work.</p>
        
        <h2>AI-Powered Design Tools</h2>
        <p>Modern AI tools can now generate entire layouts based on simple text descriptions. This allows designers to quickly prototype and iterate on designs without spending hours in traditional design software.</p>
        
        <h2>Automated Testing and Quality Assurance</h2>
        <p>AI-driven testing tools can now automatically identify bugs and usability issues, dramatically reducing the time needed for quality assurance.</p>
        
        <h2>Personalization at Scale</h2>
        <p>Perhaps the most visible impact of AI in web development is the ability to create highly personalized user experiences at scale. Machine learning algorithms can analyze user behavior and preferences to deliver customized content and recommendations.</p>
        
        <h2>Conclusion</h2>
        <p>As AI technology continues to evolve, we can expect even more profound changes in web development practices. The developers who embrace these tools will be well-positioned to create more innovative, efficient, and user-friendly websites.</p>
    ");
    $createArticle->setCategoryId($categoryId);
    $createArticle->setLocale("en-US");
    
    $newArticle = $client->content()->createArticle($createArticle);
    echo "Article created with ID: " . $newArticle->getId() . "\n";
    echo "Title: " . $newArticle->getTitle() . "\n";
    
    // Step 3: Get available domains for publishing
    echo "\nStep 3: Finding available domains for publishing...\n";
    $domains = $client->content()->getDomains();
    
    if (count($domains) === 0) {
        throw new \Exception("No domains available for publishing. Please create a domain first.");
    }
    
    $domain = $domains[0]; // Use the first available domain
    echo "Using domain: " . $domain->getName() . "\n";
    
    // Step 4: Create a content campaign
    echo "\nStep 4: Creating a content campaign...\n";
    
    // Use the article we just created
    $existingArticle = new ExistingArticle();
    $existingArticle->setType('existing');
    $existingArticle->setId($newArticle->getId());
    
    // Create a new campaign
    $createCampaign = new CreateCampaign();
    $createCampaign->setType('create');
    $createCampaign->setName("AI Web Development Campaign");
    $createCampaign->setTargetUrl("https://example.com/ai-web-development");
    
    // Create the content campaign request body
    $contentCampaign = new ContentcampaignsBody();
    $contentCampaign->setPublishDomainName($domain->getName());
    $contentCampaign->setArticle($existingArticle);
    $contentCampaign->setCampaign($createCampaign);
    
    $campaign = $client->platform()->createContentCampaign($contentCampaign);
    echo "Content campaign created with ID: " . $campaign->getId() . "\n";
    echo "Initial status: " . $campaign->getStatus() . "\n";
    
    // Step 5: Monitor the campaign status
    echo "\nStep 5: Monitoring campaign status...\n";
    $maxAttempts = 10;
    $attempts = 0;
    $completed = false;
    
    while ($attempts < $maxAttempts && !$completed) {
        $attempts++;
        echo "Checking campaign status (attempt $attempts/$maxAttempts)...\n";
        
        // Wait a bit before checking status
        sleep(5);
        
        $campaign = $client->platform()->getContentCampaign($campaign->getId());
        $status = $campaign->getStatus();
        echo "Current status: " . $status . "\n";
        
        if ($status === 'COMPLETED') {
            $completed = true;
            echo "Campaign completed successfully!\n";
            echo "Tracking URL: " . $campaign->getTrackingUrl() . "\n";
        } elseif ($status === 'PROCESSING_ERROR') {
            echo "Campaign processing error: " . json_encode($campaign->getProcessingErrorDetails()) . "\n";
            break;
        }
    }
    
    if (!$completed) {
        echo "Campaign processing is taking longer than expected. Please check the status later using the campaign ID: " . $campaign->getId() . "\n";
    }
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    
    // If there's a response data available in the exception, print it
    if (method_exists($e, 'getResponseData') && $e->getResponseData()) {
        echo "Response data: " . json_encode($e->getResponseData(), JSON_PRETTY_PRINT) . "\n";
    }
}
