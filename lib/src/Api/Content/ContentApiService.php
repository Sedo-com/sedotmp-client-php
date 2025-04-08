<?php

namespace Sedo\Api\Content;

use GuzzleHttp\Client;
use Sedo\Auth\AuthenticatorInterface;
use Sedo\Configuration;
use Sedo\SedoTMP\Content\API\ArticlesApi;
use Sedo\SedoTMP\Content\API\CategoriesApi;
use Sedo\SedoTMP\Content\API\DomainsApi;
use Sedo\SedoTMP\Content\API\GeneratedArticleApi;
use Sedo\SedoTMP\Content\API\MediaResourcesApi;
use Sedo\SedoTMP\Content\API\PublishedArticlesApi;
use Sedo\SedoTMP\Content\Model\ArticleResponse;
use Sedo\SedoTMP\Content\Model\CategoryResponse;
use Sedo\SedoTMP\Content\Model\CreateArticle;
use Sedo\SedoTMP\Content\Model\CreateCategory;
use Sedo\SedoTMP\Content\Model\DomainResponse;
use Sedo\SedoTMP\Content\Model\GenerateArticle;
use Sedo\SedoTMP\Content\Model\MediaResourceResponse;
use Sedo\SedoTMP\Content\Model\Pageable;
use Sedo\SedoTMP\Content\Model\PublishedArticleResponse;

class ContentApiService implements ContentApiServiceInterface
{
    private Configuration $config;
    private ArticlesApi $articlesApi;
    private CategoriesApi $categoriesApi;
    private DomainsApi $domainsApi;
    private GeneratedArticleApi $generatedArticleApi;
    private MediaResourcesApi $mediaResourcesApi;
    private PublishedArticlesApi $publishedArticlesApi;

    public function __construct(AuthenticatorInterface $authenticator, string $apiHost = null, ?Client $client = null)
    {
        // Initialize configuration
        $this->config = new Configuration();

        if ($apiHost) {
            $this->config->setHost($apiHost);
        } else if (isset($_ENV['API_HOST'])) {
            $this->config->setHost($_ENV['API_HOST'] . '/content/v1');
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

    /**
     * @return array<array-key, ArticleResponse>
     */
    public function getArticles(?Pageable $page = null, ?string $term = null): array
    {
        return $this->articlesApi->articlesGet($page, $term);
    }

    public function getArticle(string $id): ArticleResponse
    {
        return $this->articlesApi->articlesIdGet($id);
    }

    public function createArticle(CreateArticle $article): ArticleResponse
    {
        return $this->articlesApi->articlesPost($article);
    }

    public function generateArticle(GenerateArticle $generateArticle, bool $async = false, ?string $referenceId = null): ArticleResponse
    {
        $requestFlow = $async ? 'async' : 'sync';
        return $this->generatedArticleApi->generatedArticlesPost($generateArticle, $requestFlow, $referenceId);
    }

    /**
     * @return array<array-key, PublishedArticleResponse>
     */
    public function getPublishedArticles(?Pageable $page = null, ?string $term = null): array
    {
        return $this->publishedArticlesApi->publishedArticlesGet($page, $term);
    }

    public function getPublishedArticle(string $id): PublishedArticleResponse
    {
        return $this->publishedArticlesApi->publishedArticlesIdGet($id);
    }

    /**
     * @return array<array-key, CategoryResponse>
     */
    public function getCategories(?Pageable $page = null, ?string $term = null): array
    {
        return $this->categoriesApi->categoriesGet($page, $term);
    }

    public function getCategory(string $id): CategoryResponse
    {
        return $this->categoriesApi->categoriesIdGet($id);
    }

    public function createCategory(CreateCategory $category): CategoryResponse
    {
        return $this->categoriesApi->categoriesPost($category);
    }

    /**
     * @return array<array-key, DomainResponse>
     */
    public function getDomains(?Pageable $page = null, ?string $term = null): array
    {
        return $this->domainsApi->domainsGet($page, $term);
    }

    public function getDomain(string $id): DomainResponse
    {
        return $this->domainsApi->domainsIdGet($id);
    }

    /**
     * @return array<array-key, MediaResourceResponse>
     */
    public function getMediaResources(?Pageable $page = null, ?string $term = null): array
    {
        return $this->mediaResourcesApi->mediaResourcesGet($page, $term);
    }

    public function getMediaResource(string $id): MediaResourceResponse
    {
        return $this->mediaResourcesApi->mediaResourcesIdGet($id);
    }

    /**
     * Get the configuration object
     *
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }
}
