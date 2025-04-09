<?php

namespace Sedo\SedoTMP\Api\Content;

use Sedo\SedoTMP\OpenApi\Configuration;
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

interface ContentApiServiceInterface
{
    /**
     * Get a list of articles.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, ArticleResponse>|Problem
     */
    public function getArticles(?Pageable $page = null, ?string $term = null): array|Problem;

    /**
     * Get an article by ID.
     *
     * @param string $id Article ID
     */
    public function getArticle(string $id): ArticleResponse|Problem;

    /**
     * Create a new article.
     *
     * @param CreateArticle $article Article data
     */
    public function createArticle(CreateArticle $article): ArticleResponse|Problem;

    /**
     * Generate a new article.
     *
     * @param GenerateArticle $generateArticle Article generation data
     * @param bool            $async           Whether to process the request asynchronously
     * @param string|null     $referenceId     Optional reference ID
     */
    public function generateArticle(GenerateArticle $generateArticle, bool $async = false, ?string $referenceId = null): ArticleResponse|Problem;

    /**
     * Get a list of published articles.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, PublishedArticleResponse>|Problem
     */
    public function getPublishedArticles(?Pageable $page = null, ?string $term = null): array|Problem;

    /**
     * Get a published article by ID.
     *
     * @param string $id Published article ID
     */
    public function getPublishedArticle(string $id): PublishedArticleResponse|Problem;

    /**
     * Get a list of categories.
     *
     * @param Pageable|null $page Pagination parameters
     * @param string|null   $term Search term
     *
     * @return array<array-key, CategoryResponse>|Problem
     */
    public function getCategories(?Pageable $page = null, ?string $term = null): array|Problem;

    /**
     * Get a category by ID.
     *
     * @param string $id Category ID
     */
    public function getCategory(string $id): CategoryResponse|Problem;

    /**
     * Create a new category.
     *
     * @param CreateCategory $category Category data
     */
    public function createCategory(CreateCategory $category): CategoryResponse|Problem;

    /**
     * Get a list of domains.
     *
     * @param Pageable|null $page        Pagination parameters
     * @param string        $contentType Search term
     *
     * @return array<array-key, DomainResponse>|Problem
     */
    public function getDomains(?Pageable $page = null, string $contentType = 'application/json'): array|Problem;

    /**
     * Get a domain by ID.
     *
     * @param string $id Domain ID
     */
    public function getDomain(string $id): DomainResponse|Problem;

    /**
     * Get a list of media resources.
     *
     * @param Pageable|null $page        Pagination parameters
     * @param string        $contentType Search term
     *
     * @return array<array-key, MediaResourceResponse>|Problem
     */
    public function getMediaResources(?Pageable $page = null, string $contentType = 'application/json'): array|Problem;

    /**
     * Get a media resource by ID.
     *
     * @param string $id Media resource ID
     */
    public function getMediaResource(string $id): MediaResourceResponse|Problem;

    /**
     * Get the configuration object.
     */
    public function getConfig(): Configuration;
}
