# Sedo\PublishedArticleApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publishedArticlesGet()**](PublishedArticleApi.md#publishedArticlesGet) | **GET** /published-articles | Retrieve a list of published articles |
| [**publishedArticlesIdDelete()**](PublishedArticleApi.md#publishedArticlesIdDelete) | **DELETE** /published-articles/{id} | Unpublish an article by its ID |
| [**publishedArticlesIdGet()**](PublishedArticleApi.md#publishedArticlesIdGet) | **GET** /published-articles/{id} | Retrieve a published article by its ID |
| [**publishedArticlesPost()**](PublishedArticleApi.md#publishedArticlesPost) | **POST** /published-articles | Publish an article on a specified domain |


## `publishedArticlesGet()`

```php
publishedArticlesGet($page, $term): \Sedo\SedoTMP\Content\Model\PublishedArticleResponse[]
```

Retrieve a list of published articles

This endpoint retrieves a list of published articles available in the system. Published articles are those that have been made publicly accessible on the content sites.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\PublishedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\Content\Model\\Sedo\SedoTMP\Content\Model\Pageable(); // \Sedo\SedoTMP\Content\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer%20vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->publishedArticlesGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublishedArticleApi->publishedArticlesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\PublishedArticleResponse[]**](../Model/PublishedArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publishedArticlesIdDelete()`

```php
publishedArticlesIdDelete($id)
```

Unpublish an article by its ID

This endpoint allows you to unpublish an article by its ID. The article will be removed from the content site, but the article itself will still be available in the system. This means it can be published again in the future if needed.  **Restrictions:** - Only published articles that belong to the authenticated partner can be deleted. - The authenticated partner must have the necessary permissions to unpublish the article.  **Usage:** - Unpublishing an article removes it from public view on the content site. - The article remains in the system and can be republished at a later time if required.  **Additional Information:** - Unpublishing does not delete the article from the system; it only removes the public access to it. - Any associated media resources or metadata will remain intact and can be reused.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\PublishedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $apiInstance->publishedArticlesIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PublishedArticleApi->publishedArticlesIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publishedArticlesIdGet()`

```php
publishedArticlesIdGet($id): \Sedo\SedoTMP\Content\Model\PublishedArticleResponse
```

Retrieve a published article by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\PublishedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->publishedArticlesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublishedArticleApi->publishedArticlesIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\Content\Model\PublishedArticleResponse**](../Model/PublishedArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publishedArticlesPost()`

```php
publishedArticlesPost($publishArticle, $xSedoRequestFlow, $xSedoReferenceId): \Sedo\SedoTMP\Content\Model\PublishedArticleResponse
```

Publish an article on a specified domain

This endpoint allows you to publish an article on a specified domain. - Publishing means that the current snapshot of the article gets uploaded to specified domain. - Any changes made to the article after this point will not be automatically uploaded, they would require a new publish operation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\PublishedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$publishArticle = new \Sedo\SedoTMP\Content\Model\PublishArticle(); // \Sedo\SedoTMP\Content\Model\PublishArticle
$xSedoRequestFlow = new \Sedo\SedoTMP\Content\Model\\Sedo\SedoTMP\Content\Model\RequestFlowHeader(); // \Sedo\SedoTMP\Content\Model\RequestFlowHeader
$xSedoReferenceId = 'xSedoReferenceId_example'; // string

try {
    $result = $apiInstance->publishedArticlesPost($publishArticle, $xSedoRequestFlow, $xSedoReferenceId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublishedArticleApi->publishedArticlesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **publishArticle** | [**\Sedo\SedoTMP\Content\Model\PublishArticle**](../Model/PublishArticle.md)|  | |
| **xSedoRequestFlow** | [**\Sedo\SedoTMP\Content\Model\RequestFlowHeader**](../Model/.md)|  | [optional] |
| **xSedoReferenceId** | **string**|  | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\PublishedArticleResponse**](../Model/PublishedArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
