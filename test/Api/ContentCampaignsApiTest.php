<?php

/**
 * ContentCampaignsApiTest
 * PHP version 8.1.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

namespace Sedo\Test\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Sedo\SedoTMP\OpenApi\Configuration;
use Sedo\SedoTMP\OpenApi\Platform\API\ContentCampaignsApi;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\OpenApi\Platform\Model\Pageable;
use Sedo\Test\MockHttpClient;

/**
 * ContentCampaignsApiTest Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class ContentCampaignsApiTest extends TestCase
{
    private MockHttpClient $mockHttpClient;

    private ContentCampaignsApi $contentCampaignsApi;

    private Configuration $config;

    /**
     * Setup before running any test cases.
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case.
     */
    public function setUp(): void
    {
        $this->mockHttpClient = new MockHttpClient();

        // Create a configuration
        $this->config = new Configuration();
        $this->config->setHost('https://api.example.com/platform/v1');
        $this->config->setAccessToken('mock-access-token');

        // Create the API client with the mock HTTP client
        $this->contentCampaignsApi = new ContentCampaignsApi(
            $this->mockHttpClient->getClient(),
            $this->config
        );
    }

    /**
     * Clean up after running each test case.
     */
    public function tearDown(): void
    {
        $this->mockHttpClient->clearHistory();
    }

    /**
     * Clean up after running all test cases.
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for contentCampaignsGet.
     *
     * Retrieve a list of content campaigns.
     */
    public function testContentCampaignsGet()
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '0f7b207f-ebe2-4e52-bb72-30529c722eeb',
                'status' => 'PENDING',
                'campaign' => [
                    'name' => 'Test Campaign 1',
                ],
            ],
            [
                'id' => 'befeaacc-32c6-4ce9-9630-78e159d2c6ae',
                'status' => 'PROCESSING',
                'campaign' => [
                    'name' => 'Test Campaign 2',
                ],
            ],
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($responseData)
        );

        // Call the method
        $pageable = new Pageable();
        $pageable->setPage(1);
        $pageable->setSize(10);

        $result = $this->contentCampaignsApi->contentCampaignsGet($pageable, 'test');

        // Assert the result
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(ContentCampaignResponse::class, $result[0]);
        $this->assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result[0]->getId());
        $this->assertEquals('Test Campaign 1', $result[0]->getCampaign()->getName());
        $this->assertEquals('PENDING', $result[0]->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());
        $this->assertEquals('page=1&size=10&sort&term=test', $request->getUri()->getQuery());
    }

    /**
     * Test case for contentCampaignsIdGet.
     *
     * Retrieve a content campaign by its ID.
     */
    public function testContentCampaignsIdGet(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '0f7b207f-ebe2-4e52-bb72-30529c722eeb',
            'status' => 'PENDING',
            'campaign' => [
                'name' => 'Test Campaign',
            ],
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            json_encode($responseData)
        );

        // Call the method
        $result = $this->contentCampaignsApi->contentCampaignsIdGet('0f7b207f-ebe2-4e52-bb72-30529c722eeb');

        // Assert the result
        $this->assertInstanceOf(ContentCampaignResponse::class, $result);
        $this->assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result->getId());
        $this->assertEquals('Test Campaign', $result->getCampaign()->getName());
        $this->assertEquals('PENDING', $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns/0f7b207f-ebe2-4e52-bb72-30529c722eeb', $request->getUri()->getPath());
    }

    /**
     * Test case for contentCampaignsPost.
     *
     * Create a new content campaign.
     */
    public function testContentCampaignsPost(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '0f7b207f-ebe2-4e52-bb72-30529c722eeb',
            'status' => 'PENDING',
            'campaign' => [
                'name' => 'New Campaign',
            ],
        ];

        $this->mockHttpClient->addResponse(
            201,
            ['Content-Type' => 'application/json'],
            json_encode($responseData)
        );

        // Create the content campaign request
        $article = new ContentCampaignsPostRequestArticle();
        $article->setTitle('Test Article');
        $article->setExcerpt('This is a test article content');

        $campaign = new ContentCampaignsPostRequestCampaign();
        $campaign->setName('New Campaign');
        $campaign->setType('Test');

        $contentCampaign = new ContentCampaignsPostRequest();
        $contentCampaign->setPublishDomainName('example.com');
        $contentCampaign->setArticle($article);
        $contentCampaign->setCampaign($campaign);

        // Call the method
        $result = $this->contentCampaignsApi->contentCampaignsPost($contentCampaign);

        // Assert the result
        $this->assertInstanceOf(ContentCampaignResponse::class, $result);
        $this->assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result->getId());
        $this->assertEquals('New Campaign', $result->getCampaign()->getName());
        $this->assertEquals('PENDING', $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());

        // Verify request body contains the expected data
        $requestBody = (string) $request->getBody();
        $this->assertStringContainsString('"publishDomainName":"example.com"', $requestBody);
        $this->assertStringContainsString('"title":"Test Article"', $requestBody);
        $this->assertStringContainsString('"name":"New Campaign"', $requestBody);
    }

    /**
     * Test case for trackedContentOrdersGet.
     *
     * Retrieve a list of tracked content orders.
     */
    public function testTrackedContentOrdersGet()
    {
        // This test is a placeholder for a future implementation
        $this->markTestSkipped('API endpoint not implemented yet');
    }

    /**
     * Test case for trackedContentOrdersIdGet.
     *
     * Retrieve a tracked content order by its ID.
     */
    public function testTrackedContentOrdersIdGet()
    {
        // This test is a placeholder for a future implementation
        $this->markTestSkipped('API endpoint not implemented yet');
    }

    /**
     * Test case for trackedContentOrdersPost.
     *
     * Create a new tracked content order.
     */
    public function testTrackedContentOrdersPost()
    {
        // This test is a placeholder for a future implementation
        $this->markTestSkipped('API endpoint not implemented yet');
    }
}
