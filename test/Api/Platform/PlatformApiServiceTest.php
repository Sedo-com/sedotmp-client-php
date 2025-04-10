<?php

namespace Sedo\Test\Api\Platform;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
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
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $pageable = new Pageable();
        $pageable->setPage(1);
        $pageable->setSize(10);

        $result = $this->platformApiService->getContentCampaigns($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(ContentCampaignResponse::class, $result[0]);
        self::assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result[0]->getId());
        self::assertEquals('Test Campaign 1', $result[0]->getCampaign()->getName());
        self::assertEquals('PENDING', $result[0]->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort&term=test', $request->getUri()->getQuery());
    }

    public function testGetContentCampaign(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '0f7b207f-ebe2-4e52-bb72-30529c722eeb',
            'status' => 'ARTICLE_PUBLISHED',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->platformApiService->getContentCampaign('0f7b207f-ebe2-4e52-bb72-30529c722eeb');

        // Assert the result
        self::assertInstanceOf(ContentCampaignResponse::class, $result);
        self::assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result->getId());
        self::assertEquals('ARTICLE_PUBLISHED', $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/platform/v1/content-campaigns/0f7b207f-ebe2-4e52-bb72-30529c722eeb',
            $request->getUri()->getPath());
    }

    public function testCreateContentCampaign(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '0f7b207f-ebe2-4e52-bb72-30529c722eeb',
            'campaign' => [
                'name' => 'New Campaign',
            ],
            'status' => 'PENDING',
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
        self::assertInstanceOf(ContentCampaignResponse::class, $result);
        self::assertEquals('0f7b207f-ebe2-4e52-bb72-30529c722eeb', $result->getId());
        self::assertEquals('New Campaign', $result->getCampaign()->getName());
        self::assertEquals('PENDING', $result->getStatus());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('POST', $request->getMethod());
        self::assertEquals('/platform/v1/content-campaigns', $request->getUri()->getPath());

        // Verify request body contains the expected data
        $requestBody = (string) $request->getBody();
        self::assertStringContainsString('"publishDomainName":"example.com"', $requestBody);
        self::assertStringContainsString('"title":"Test Article"', $requestBody);
        self::assertStringContainsString('"name":"New Campaign"', $requestBody);
    }
}
