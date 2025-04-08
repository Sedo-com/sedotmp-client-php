# Sedo\SedoTMP\OpenApi\DetailedArticleApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**detailedArticlesGet()**](DetailedArticleApi.md#detailedArticlesGet) | **GET** /detailed-articles | List detailed-articles, compared to article this includes additionally published-article information |
| [**detailedArticlesIdGet()**](DetailedArticleApi.md#detailedArticlesIdGet) | **GET** /detailed-articles/{id} | Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information |


## `detailedArticlesGet()`

```php
detailedArticlesGet($page, $term): \Sedo\SedoTMP\OpenApi\Content\Model\DetailedArticleResponse[]
```

List detailed-articles, compared to article this includes additionally published-article information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\DetailedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\OpenApi\Content\Model\\Sedo\SedoTMP\OpenApi\Content\Model\Pageable(); // \Sedo\SedoTMP\OpenApi\Content\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer%20vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->detailedArticlesGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DetailedArticleApi->detailedArticlesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\OpenApi\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\DetailedArticleResponse[]**](../Model/DetailedArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `detailedArticlesIdGet()`

```php
detailedArticlesIdGet($id): \Sedo\SedoTMP\OpenApi\Content\Model\DetailedArticleResponse
```

Retrieve an detailed-articles by its articleId, compared to article this includes additionally published-article information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\DetailedArticleApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->detailedArticlesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DetailedArticleApi->detailedArticlesIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\DetailedArticleResponse**](../Model/DetailedArticleResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
