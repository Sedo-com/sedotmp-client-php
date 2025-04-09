<?php

namespace Sedo\SedoTMP\Api\Content;

use Sedo\SedoTMP\Exception\ProblemResponseException;
use Sedo\SedoTMP\OpenApi\Configuration;
use Sedo\SedoTMP\OpenApi\Content\Model\ArticleResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory;
use Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle;
use Sedo\SedoTMP\OpenApi\Content\Model\MediaResourceResponse;
use Sedo\SedoTMP\OpenApi\Content\Model\Pageable;
use Sedo\SedoTMP\OpenApi\Content\Model\PublishedArticleResponse;

interface ContentApiServiceInterface
{
    /**
     * Get a list of articles.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, ArticleResponse>
     *
     * @throws ProblemResponseException
     */
    public function getArticles(?Pageable $page = null, ?string $term = null): array;

    /**
     * Get an article by ID.
     *
     * @param string $id Article ID
     *
     * @throws ProblemResponseException
     */
    public function getArticle(string $id): ArticleResponse;

    /**
     * Create a new article.
     *
     * @param CreateArticle $article Article data
     *
     * @throws ProblemResponseException
     */
    public function createArticle(CreateArticle $article): ArticleResponse;

    /**
     * Generate a new article.
     *
     * @param GenerateArticle $generateArticle Article generation data
     * @param bool            $async           Whether to process the request asynchronously
     * @param string|null     $referenceId     Optional reference ID
     *
     * @throws ProblemResponseException
     */
    public function generateArticle(GenerateArticle $generateArticle, bool $async = false, ?string $referenceId = null): ArticleResponse;

    /**
     * Get a list of published articles.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, PublishedArticleResponse>
     *
     * @throws ProblemResponseException
     */
    public function getPublishedArticles(?Pageable $page = null, ?string $term = null): array;

    /**
     * Get a published article by ID.
     *
     * @param string $id Published article ID
     *
     * @throws ProblemResponseException
     */
    public function getPublishedArticle(string $id): PublishedArticleResponse;

    /**
     * Get a list of categories.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, CategoryResponse>
     *
     * @throws ProblemResponseException
     */
    public function getCategories(?Pageable $page = null, ?string $term = null): array;

    /**
     * Get a category by ID.
     *
     * @param string $id Category ID
     *
     * @throws ProblemResponseException
     */
    public function getCategory(string $id): CategoryResponse;

    /**
     * Create a new category.
     *
     * @param CreateCategory $category Category data
     *
     * @throws ProblemResponseException
     */
    public function createCategory(CreateCategory $category): CategoryResponse;

    /**
     * Get a list of domains.
     *
     * @param Pageable|null $page        Pagination parameters
     * @param string        $contentType Search term
     *
     * @return array<array-key, DomainResponse>
     *
     * @throws ProblemResponseException
     */
    public function getDomains(?Pageable $page = null, string $contentType = 'application/json'): array;

    /**
     * Get a domain by ID.
     *
     * @param string $id Domain ID
     *
     * @throws ProblemResponseException
     */
    public function getDomain(string $id): DomainResponse;

    /**
     * Get a list of media resources.
     *
     * @param Pageable|null $page        Pagination parameters
     * @param string        $contentType Search term
     *
     * @return array<array-key, MediaResourceResponse>
     *
     * @throws ProblemResponseException
     */
    public function getMediaResources(?Pageable $page = null, string $contentType = 'application/json'): array;

    /**
     * Get a media resource by ID.
     *
     * @param string $id Media resource ID
     *
     * @throws ProblemResponseException
     */
    public function getMediaResource(string $id): MediaResourceResponse;

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration;
}
