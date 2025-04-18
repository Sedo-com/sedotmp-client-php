# Sedo\SedoTMP\OpenApi\CategoryApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**categoriesGet()**](CategoryApi.md#categoriesGet) | **GET** /categories | Retrieve a list of content categories |
| [**categoriesIdGet()**](CategoryApi.md#categoriesIdGet) | **GET** /categories/{id} | Retrieve a content category by its ID |
| [**categoriesPost()**](CategoryApi.md#categoriesPost) | **POST** /categories | Create a new content category |


## `categoriesGet()`

```php
categoriesGet($page, $term): \Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse[]
```

Retrieve a list of content categories

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\CategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\OpenApi\Content\Model\\Sedo\SedoTMP\OpenApi\Content\Model\Pageable(); // \Sedo\SedoTMP\OpenApi\Content\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer%20vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->categoriesGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CategoryApi->categoriesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\OpenApi\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse[]**](../Model/CategoryResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `categoriesIdGet()`

```php
categoriesIdGet($id): \Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse
```

Retrieve a content category by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\CategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->categoriesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CategoryApi->categoriesIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse**](../Model/CategoryResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `categoriesPost()`

```php
categoriesPost($createCategory): \Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse
```

Create a new content category

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\CategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$createCategory = new \Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory(); // \Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory

try {
    $result = $apiInstance->categoriesPost($createCategory);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CategoryApi->categoriesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCategory** | [**\Sedo\SedoTMP\OpenApi\Content\Model\CreateCategory**](../Model/CreateCategory.md)|  | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\CategoryResponse**](../Model/CategoryResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
