<?php

namespace Sedo\Test\Api\Platform;

use GuzzleHttp\Psr7\Response;
use Sedo\SedoTMP\Api\Platform\PlatformApiService;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\OpenApi\Platform\Model\Pageable;
use Sedo\Test\ApiServiceTestCase;

class PlatformApiServiceTest extends ApiServiceTestCase
{
    private PlatformApiService $platformApiService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->platformApiService = new PlatformApiService(
            $this->mockAuthenticator,
            'https://api.example.com/platform/v1',
            $this->mockHttpClient->getClient()
        );
    }

    public function testGetContentCampaigns(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => str_pad('123', 36, '0', STR_PAD_LEFT),
                'name' => 'Test Campaign 1',
                'status' => 1,
            ],
            [
                'id' => str_pad('456', 36, '0', STR_PAD_LEFT),
                'name' => 'Test Campaign 2',
                'status' => 2,
            ],
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $pageable = new Pageable();
        $pageable->setPage(1);
        $pageable->setSize(10);

        $result = $this->platformApiService->getContentCampaigns($pageable, 'test');

        // Assert the result
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(ContentCampaignResponse::class, $result[0]);
        $this->assertEquals('123', $result[0]->getId());
        $this->assertEquals('Test Campaign 1', $result[0]->getName());
        $this->assertEquals(1, $result[0]->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());
        $this->assertEquals('page=1&size=10&term=test', $request->getUri()->getQuery());
    }

    public function testGetContentCampaign(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => str_pad('123', 36, '0', STR_PAD_LEFT),
            'name' => 'Test Campaign',
            'status' => 1,
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->platformApiService->getContentCampaign('123');

        // Assert the result
        $this->assertInstanceOf(ContentCampaignResponse::class, $result);
        $this->assertEquals('123', $result->getId());
        $this->assertEquals('Test Campaign', $result->getName());
        $this->assertEquals(1, $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns/123', $request->getUri()->getPath());
    }

    public function testCreateContentCampaign(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'name' => 'New Campaign',
            'status' => 0,
        ];

        $this->mockHttpClient->addResponse(
            201,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
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
        $result = $this->platformApiService->createContentCampaign($contentCampaign);

        // Assert the result
        $this->assertInstanceOf(ContentCampaignResponse::class, $result);
        $this->assertEquals('123', $result->getId());
        $this->assertEquals('New Campaign', $result->getCampaign()->getName());
        $this->assertEquals(0, $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());

        // Verify request body contains the expected data
        $requestBody = (string) $request->getBody();
        $this->assertStringContainsString('"publishDomainName":"example.com"', $requestBody);
        $this->assertStringContainsString('"title":"Test Article"', $requestBody);
        $this->assertStringContainsString('"name":"New Campaign"', $requestBody);
        $this->assertStringContainsString('"budget":100', $requestBody);
    }

    public function testGetConfig(): void
    {
        $config = $this->platformApiService->getConfig();
        $this->assertEquals('https://api.example.com/platform/v1', $config->getHost());
        $this->assertEquals('mock-access-token', $config->getAccessToken());
    }
}
