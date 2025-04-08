# Sedo\ArticlesApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**articlesGet()**](ArticlesApi.md#articlesGet) | **GET** /articles | Retrieve a list of articles |
| [**articlesIdDelete()**](ArticlesApi.md#articlesIdDelete) | **DELETE** /articles/{id} | Delete an article by its ID |
| [**articlesIdGet()**](ArticlesApi.md#articlesIdGet) | **GET** /articles/{id} | Retrieve an article by its ID |
| [**articlesIdPatch()**](ArticlesApi.md#articlesIdPatch) | **PATCH** /articles/{id} | Partially update an article by its ID |
| [**articlesIdPut()**](ArticlesApi.md#articlesIdPut) | **PUT** /articles/{id} | Fully update an article by its ID |
| [**articlesPost()**](ArticlesApi.md#articlesPost) | **POST** /articles | Create a new article |
| [**generatedArticlesPost()**](ArticlesApi.md#generatedArticlesPost) | **POST** /generated-articles | Generate a new article for a specified topic |


## `articlesGet()`

```php
articlesGet($page, $term): \Sedo\SedoTMP\Content\Model\ArticleResponse[]
```

Retrieve a list of articles

This endpoint retrieves a list of articles available in the system. Only articles that belong to the authenticated partner will be listed, or all if the authenticated user has sufficient privileges. No details about published articles will be included in the response. To see details about published articles, you need to call the `/published-articles` endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\Content\Model\\Sedo\SedoTMP\Content\Model\Pageable(); // \Sedo\SedoTMP\Content\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer%20vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->articlesGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse[]**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `articlesIdDelete()`

```php
articlesIdDelete($id)
```

Delete an article by its ID

This endpoint deletes an article by its ID. Note that deleting an article does not affect the resources used within that article. For example, if a category or media resource was used for the article creation, they will remain untouched and can be reused for the creation of other articles.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $apiInstance->articlesIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `articlesIdGet()`

```php
articlesIdGet($id): \Sedo\SedoTMP\Content\Model\ArticleResponse
```

Retrieve an article by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->articlesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `articlesIdPatch()`

```php
articlesIdPatch($id, $updateArticle): \Sedo\SedoTMP\Content\Model\ArticleResponse
```

Partially update an article by its ID

**Publishing Note:** - If the article is already published, changes made through this endpoint will not be visible until the article is published again by calling the `/published-articles` POST endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id
$updateArticle = new \Sedo\SedoTMP\Content\Model\UpdateArticle(); // \Sedo\SedoTMP\Content\Model\UpdateArticle

try {
    $result = $apiInstance->articlesIdPatch($id, $updateArticle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesIdPatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |
| **updateArticle** | [**\Sedo\SedoTMP\Content\Model\UpdateArticle**](../Model/UpdateArticle.md)|  | |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `articlesIdPut()`

```php
articlesIdPut($id, $updateArticle): \Sedo\SedoTMP\Content\Model\ArticleResponse
```

Fully update an article by its ID

**Publishing Note:** - If the article is already published, changes made through this endpoint will not be visible until the article is published again by calling the `/published-articles` POST endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id
$updateArticle = new \Sedo\SedoTMP\Content\Model\UpdateArticle(); // \Sedo\SedoTMP\Content\Model\UpdateArticle

try {
    $result = $apiInstance->articlesIdPut($id, $updateArticle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |
| **updateArticle** | [**\Sedo\SedoTMP\Content\Model\UpdateArticle**](../Model/UpdateArticle.md)|  | |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `articlesPost()`

```php
articlesPost($createArticle): \Sedo\SedoTMP\Content\Model\ArticleResponse
```

Create a new article

With this endpoint you can import and existing article into the system. To make the article available on the content site, it needs to be uploaded/published. You can find available domains for publishing using the `/domains` endpoint. To streamline the process, you can specify the domain at generation time, and the article will be published automatically in the background. The generated article will be listed in the article list, and its publishing status can be checked using the `/published-articles` endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$createArticle = new \Sedo\SedoTMP\Content\Model\CreateArticle(); // \Sedo\SedoTMP\Content\Model\CreateArticle

try {
    $result = $apiInstance->articlesPost($createArticle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->articlesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createArticle** | [**\Sedo\SedoTMP\Content\Model\CreateArticle**](../Model/CreateArticle.md)|  | |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `generatedArticlesPost()`

```php
generatedArticlesPost($generateArticle, $xSedoRequestFlow, $xSedoReferenceId): \Sedo\SedoTMP\Content\Model\ArticleResponse
```

Generate a new article for a specified topic

This endpoint allows you to generate a new article for a specific topic. Article generation can take some time, so you can choose to process the request either synchronously or asynchronously using the `X-Sedo-Request-Flow` header.  Once the article is generated, it will be stored in our system. To make the article available on the content site, it needs to be uploaded/published. You can find available domains for publishing using the `/domains` endpoint. To streamline the process, you can specify the domain at generation time, and the article will be published automatically in the background. The generated article will be listed in the article list, and its publishing status can be checked using the `/published-articles` endpoint.  To ensure fair usage and protect our system from abuse, we apply certain limits on article generation:   - **Content Generation:** Limited to a certain number of requests per hour.   - **Resource Usage:** Limited to a certain amount of resources per day.  If these limits are exceeded, a `TooManyRequests` error response will be returned.  **Compliance Check:** Articles published on our content sites must adhere to several regulations and guidelines. Before generating an article, it is checked for compliance. If the article does not meet the guidelines, the generation may fail, or modifications may be applied to the requested topic, title, and other fields to ensure compliance and enhance user experience.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\ArticlesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generateArticle = new \Sedo\SedoTMP\Content\Model\GenerateArticle(); // \Sedo\SedoTMP\Content\Model\GenerateArticle
$xSedoRequestFlow = new \Sedo\SedoTMP\Content\Model\\Sedo\SedoTMP\Content\Model\RequestFlowHeader(); // \Sedo\SedoTMP\Content\Model\RequestFlowHeader
$xSedoReferenceId = 'xSedoReferenceId_example'; // string

try {
    $result = $apiInstance->generatedArticlesPost($generateArticle, $xSedoRequestFlow, $xSedoReferenceId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ArticlesApi->generatedArticlesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **generateArticle** | [**\Sedo\SedoTMP\Content\Model\GenerateArticle**](../Model/GenerateArticle.md)|  | |
| **xSedoRequestFlow** | [**\Sedo\SedoTMP\Content\Model\RequestFlowHeader**](../Model/.md)|  | [optional] |
| **xSedoReferenceId** | **string**|  | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\ArticleResponse**](../Model/ArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
