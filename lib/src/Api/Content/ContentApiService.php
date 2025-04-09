<?php

namespace Sedo\SedoTMP\Api\Content;

use GuzzleHttp\Client;
use Sedo\SedoTMP\Auth\AuthenticatorInterface;
use Sedo\SedoTMP\Exception\ProblemResponseException;
use Sedo\SedoTMP\Exception\UnexpectedTypeException;
use Sedo\SedoTMP\OpenApi\Configuration;
use Sedo\SedoTMP\OpenApi\Content\API\ArticlesApi;
use Sedo\SedoTMP\OpenApi\Content\API\CategoriesApi;
use Sedo\SedoTMP\OpenApi\Content\API\DomainsApi;
use Sedo\SedoTMP\OpenApi\Content\API\GeneratedArticleApi;
use Sedo\SedoTMP\OpenApi\Content\API\MediaResourcesApi;
use Sedo\SedoTMP\OpenApi\Content\API\PublishedArticlesApi;
use Sedo\SedoTMP\OpenApi\Content\Model\ArticleResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory;
use Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\MediaResourceResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Content\Model\Problem;
use Sedo\SedoTMP\OpenApi\Content\Model\PublishedArticleResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\RequestFlowHeader;

class ContentApiService implements ContentApiServiceInterface
{
    private Configuration $config;
    private ArticlesApi $articlesApi;
    private CategoriesApi $categoriesApi;
    private DomainsApi $domainsApi;
    private GeneratedArticleApi $generatedArticleApi;
    private MediaResourcesApi $mediaResourcesApi;
    private PublishedArticlesApi $publishedArticlesApi;

    public function __construct(AuthenticatorInterface $authenticator, ?string $apiHost = null, ?Client $client = null)
    {
        // Initialize configuration
        $this->config = new Configuration();

        if ($apiHost) {
            $this->config->setHost($apiHost);
        } elseif (isset($_ENV['API_HOST']) && is_string($_ENV['API_HOST'])) {
            $this->config->setHost(sprintf('%s/content/v1', $_ENV['API_HOST']));
        }

        // Set access token from authenticator
        $this->config->setAccessToken($authenticator->getAccessToken());

        $client = $client ?? new Client();

        // Initialize API clients
        $this->articlesApi = new ArticlesApi($client, $this->config);
        $this->categoriesApi = new CategoriesApi($client, $this->config);
        $this->domainsApi = new DomainsApi($client, $this->config);
        $this->generatedArticleApi = new GeneratedArticleApi($client, $this->config);
        $this->mediaResourcesApi = new MediaResourcesApi($client, $this->config);
        $this->publishedArticlesApi = new PublishedArticlesApi($client, $this->config);
    }

    public function getArticles(?Pageable $page = null, ?string $term = null): array
    {
        $response = $this->articlesApi->articlesGet($page, $term);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getArticle(string $id): ArticleResponse
    {
        $response = $this->articlesApi->articlesIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function createArticle(CreateArticle $article): ArticleResponse
    {
        $response = $this->articlesApi->articlesPost($article);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function generateArticle(
        GenerateArticle $generateArticle,
        bool $async = false,
        ?string $referenceId = null,
    ): ArticleResponse {
        $requestFlow = $async ? RequestFlowHeader::ASYNC : RequestFlowHeader::SYNC;

        // @phpstan-ignore argument.type (because OpenAPI Generator does not create real enums)
        $response = $this->generatedArticleApi->generatedArticlesPost($generateArticle, $requestFlow, $referenceId);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        if (!$response instanceof ArticleResponse) {
            throw UnexpectedTypeException::fromMixed($response, [ArticleResponse::class, Problem::class]);
        }

        return $response;
    }

    /**
     * @return array<array-key, PublishedArticleResponse>
     */
    public function getPublishedArticles(?Pageable $page = null, ?string $term = null): array
    {
        $response = $this->publishedArticlesApi->publishedArticlesGet($page, $term);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getPublishedArticle(string $id): PublishedArticleResponse
    {
        $response = $this->publishedArticlesApi->publishedArticlesIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    /**
     * @return array<array-key, CategoryResponse>
     */
    public function getCategories(?Pageable $page = null, ?string $term = null): array
    {
        $response = $this->categoriesApi->categoriesGet($page, $term);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getCategory(string $id): CategoryResponse
    {
        $response = $this->categoriesApi->categoriesIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function createCategory(CreateCategory $category): CategoryResponse
    {
        $response = $this->categoriesApi->categoriesPost($category);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    /**
     * @return array<array-key, DomainResponse>
     */
    public function getDomains(?Pageable $page = null, string $contentType = 'application/json'): array
    {
        $response = $this->domainsApi->domainsGet($page, $contentType);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getDomain(string $id): DomainResponse
    {
        $response = $this->domainsApi->domainsIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    /**
     * @return array<array-key, MediaResourceResponse>
     */
    public function getMediaResources(?Pageable $page = null, string $contentType = 'application/json'): array
    {
        $response = $this->mediaResourcesApi->mediaGet($page, $contentType);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    public function getMediaResource(string $id): MediaResourceResponse
    {
        $response = $this->mediaResourcesApi->mediaIdGet($id);

        if ($response instanceof Problem) {
            throw ProblemResponseException::fromProblem($response);
        }

        return $response;
    }

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
