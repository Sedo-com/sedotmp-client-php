# Sedo\SedoTMP\OpenApi\DomainApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**domainsGet()**](DomainApi.md#domainsGet) | **GET** /domains | Retrieve a list of domains |
| [**domainsIdGet()**](DomainApi.md#domainsIdGet) | **GET** /domains/{id} | Retrieve a domain by its ID |


## `domainsGet()`

```php
domainsGet($page): \Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse[]
```

Retrieve a list of domains

This endpoint retrieves a list of domains available in the system. Domains, sometimes referred to as content sites, are configured to be used for publishing articles, categories, and tags.  **Permissions:** - Only users with sufficient permissions can perform this operation.  **Domains:** - Domains represent the content sites where articles and other content are published. - Each domain can have specific configurations and settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\OpenApi\Content\Model\\Sedo\SedoTMP\OpenApi\Content\Model\Pageable(); // \Sedo\SedoTMP\OpenApi\Content\Model\Pageable | Pageable object (every key is a separate query parameter)

try {
    $result = $apiInstance->domainsGet($page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->domainsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\OpenApi\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse[]**](../Model/DomainResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `domainsIdGet()`

```php
domainsIdGet($id): \Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse
```

Retrieve a domain by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->domainsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->domainsIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Content\Model\DomainResponse**](../Model/DomainResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
