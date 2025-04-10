<?php

namespace Sedo\Test\Api\Content;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Sedo\SedoTMP\Api\Content\ContentApiService;
use Sedo\SedoTMP\OpenApi\Content\Model\ArticleResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory;
use Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\MediaResourceResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Content\Model\PublishedArticleResponse;
use Sedo\Test\ApiServiceTestCase;

class ContentApiServiceTest extends ApiServiceTestCase
{
    private ContentApiService $contentApiService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->contentApiService = new ContentApiService(
            $this->mockAuthenticator,
            'https://api.example.com/content/v1',
            $this->mockHttpClient->getClient()
        );
    }

    public function testGetArticles(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '123',
                'title' => 'Test Article 1',
                'content' => 'This is a test article',
            ],
            [
                'id' => '456',
                'title' => 'Test Article 2',
                'content' => 'This is another test article',
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

        $result = $this->contentApiService->getArticles($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(ArticleResponse::class, $result[0]);
        self::assertEquals('123', $result[0]->getId());
        self::assertEquals('Test Article 1', $result[0]->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/articles', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort&term=test', $request->getUri()->getQuery());
    }

    public function testGetArticle(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'Test Article',
            'content' => 'This is a test article',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->contentApiService->getArticle('123');

        // Assert the result
        self::assertInstanceOf(ArticleResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('Test Article', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/articles/123', $request->getUri()->getPath());
    }

    public function testCreateArticle(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'New Article',
            'content' => 'This is a new article',
        ];

        $this->mockHttpClient->addResponse(
            201,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Create the article request
        $article = new CreateArticle();
        $article->setTitle('New Article');
        $article->setText('This is a new article');

        // Call the method
        $result = $this->contentApiService->createArticle($article);

        // Assert the result
        self::assertInstanceOf(ArticleResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('New Article', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('POST', $request->getMethod());
        self::assertEquals('/content/v1/articles', $request->getUri()->getPath());
    }

    public function testGenerateArticle(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'Generated Article',
            'content' => 'This is a generated article',
        ];

        $this->mockHttpClient->addResponse(
            201,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Create the generate article request
        $generateArticle = new GenerateArticle();
        $generateArticle->setTags(['test', 'article']);

        // Call the method
        $result = $this->contentApiService->generateArticle($generateArticle);

        // Assert the result
        self::assertInstanceOf(ArticleResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('Generated Article', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();

        self::assertInstanceOf(RequestInterface::class, $request);
        self::assertEquals('POST', $request->getMethod());
        self::assertEquals('/content/v1/generated-articles', $request->getUri()->getPath());

        $headers = $request->getHeaders();
        self::assertArrayHasKey('X-Sedo-Request-Flow', $headers);
        self::assertEquals('SYNC', $headers['X-Sedo-Request-Flow'][0]);
    }

    public function testGetPublishedArticles(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '123',
                'title' => 'Published Article 1',
                'content' => 'This is a published article',
            ],
            [
                'id' => '456',
                'title' => 'Published Article 2',
                'content' => 'This is another published article',
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

        $result = $this->contentApiService->getPublishedArticles($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(PublishedArticleResponse::class, $result[0]);
        self::assertEquals('123', $result[0]->getId());
        self::assertEquals('Published Article 1', $result[0]->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/published-articles', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort&term=test', $request->getUri()->getQuery());
    }

    public function testGetPublishedArticle(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'Published Article',
            'content' => 'This is a published article',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->contentApiService->getPublishedArticle('123');

        // Assert the result
        self::assertInstanceOf(PublishedArticleResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('Published Article', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/published-articles/123', $request->getUri()->getPath());
    }

    public function testGetCategories(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '123',
                'title' => 'Category 1',
            ],
            [
                'id' => '456',
                'title' => 'Category 2',
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

        $result = $this->contentApiService->getCategories($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(CategoryResponse::class, $result[0]);
        self::assertEquals('123', $result[0]->getId());
        self::assertEquals('Category 1', $result[0]->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/categories', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort&term=test', $request->getUri()->getQuery());
    }

    public function testGetCategory(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'Test Category',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->contentApiService->getCategory('123');

        // Assert the result
        self::assertInstanceOf(CategoryResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('Test Category', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/categories/123', $request->getUri()->getPath());
    }

    public function testCreateCategory(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'title' => 'New Category',
        ];

        $this->mockHttpClient->addResponse(
            201,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Create the category request
        $category = new CreateCategory();
        $category->setTitle('New Category');

        // Call the method
        $result = $this->contentApiService->createCategory($category);

        // Assert the result
        self::assertInstanceOf(CategoryResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('New Category', $result->getTitle());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('POST', $request->getMethod());
        self::assertEquals('/content/v1/categories', $request->getUri()->getPath());
    }

    public function testGetDomains(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '123',
                'domain' => 'example.com',
            ],
            [
                'id' => '456',
                'domain' => 'test.com',
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

        $result = $this->contentApiService->getDomains($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(DomainResponse::class, $result[0]);
        self::assertEquals('123', $result[0]->getId());
        self::assertEquals('example.com', $result[0]->getDomain());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/domains', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort', $request->getUri()->getQuery());
    }

    public function testGetDomain(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'domain' => 'example.com',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->contentApiService->getDomain('123');

        // Assert the result
        self::assertInstanceOf(DomainResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('example.com', $result->getDomain());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/domains/123', $request->getUri()->getPath());
    }

    public function testGetMediaResources(): void
    {
        // Prepare mock response
        $responseData = [
            [
                'id' => '123',
                'name' => 'image1.jpg',
                'url' => 'https://example.com/images/image1.jpg',
            ],
            [
                'id' => '456',
                'name' => 'image2.jpg',
                'url' => 'https://example.com/images/image2.jpg',
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

        $result = $this->contentApiService->getMediaResources($pageable, 'test');

        // Assert the result
        self::assertIsArray($result);
        self::assertCount(2, $result);
        self::assertInstanceOf(MediaResourceResponse::class, $result[0]);
        self::assertEquals('123', $result[0]->getId());
        self::assertEquals('image1.jpg', $result[0]->getName());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/media', $request->getUri()->getPath());
        self::assertEquals('page=1&size=10&sort', $request->getUri()->getQuery());
    }

    public function testGetMediaResource(): void
    {
        // Prepare mock response
        $responseData = [
            'id' => '123',
            'name' => 'image1.jpg',
            'url' => 'https://example.com/images/image1.jpg',
        ];

        $this->mockHttpClient->addResponse(
            200,
            ['Content-Type' => 'application/json'],
            $this->createJsonResponse($responseData)
        );

        // Call the method
        $result = $this->contentApiService->getMediaResource('123');

        // Assert the result
        self::assertInstanceOf(MediaResourceResponse::class, $result);
        self::assertEquals('123', $result->getId());
        self::assertEquals('image1.jpg', $result->getName());

        // Verify the request
        $request = $this->mockHttpClient->getLastRequest();
        self::assertInstanceOf(RequestInterface::class, $request);

        self::assertEquals('GET', $request->getMethod());
        self::assertEquals('/content/v1/media/123', $request->getUri()->getPath());
    }
}
