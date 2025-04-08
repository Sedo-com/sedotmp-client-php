# Sedo\MediaResourcesApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**mediaDownloadIdGet()**](MediaResourcesApi.md#mediaDownloadIdGet) | **GET** /media/download/{id} | Download a media resource by its ID |
| [**mediaGet()**](MediaResourcesApi.md#mediaGet) | **GET** /media | Retrieve a list of media resources |
| [**mediaIdDelete()**](MediaResourcesApi.md#mediaIdDelete) | **DELETE** /media/{id} | Delete a media resource by its ID |
| [**mediaIdGet()**](MediaResourcesApi.md#mediaIdGet) | **GET** /media/{id} | Retrieve a media resource by its ID |
| [**mediaPost()**](MediaResourcesApi.md#mediaPost) | **POST** /media | Create a new media resource |


## `mediaDownloadIdGet()`

```php
mediaDownloadIdGet($id): \SplFileObject
```

Download a media resource by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\MediaResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->mediaDownloadIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaResourcesApi->mediaDownloadIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

**\SplFileObject**

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `image/jpg`, `image/jpeg`, `image/webp`, `image/png`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mediaGet()`

```php
mediaGet($page): \Sedo\SedoTMP\Content\Model\MediaResourceResponse[]
```

Retrieve a list of media resources

This endpoint retrieves a list of all media resources stored in the system, filtered by partner. Media resources for now, include only images that can be used in articles.  **Permissions:** - Only users with sufficient permissions can perform this operation.  **Media Resources:** - Media resources are files that can be attached to articles to enhance their content. - These resources are stored in the system and can be reused across multiple articles.  **Usage:** - Media resources can be used when creating new articles. - When an article that includes a media resource is published, the media resource will also be published to the content site.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\MediaResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = new \Sedo\SedoTMP\Content\Model\\Sedo\SedoTMP\Content\Model\Pageable(); // \Sedo\SedoTMP\Content\Model\Pageable | Pageable object (every key is a separate query parameter)

try {
    $result = $apiInstance->mediaGet($page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaResourcesApi->mediaGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\Content\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\MediaResourceResponse[]**](../Model/MediaResourceResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mediaIdDelete()`

```php
mediaIdDelete($id)
```

Delete a media resource by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\MediaResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $apiInstance->mediaIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling MediaResourcesApi->mediaIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `mediaIdGet()`

```php
mediaIdGet($id): \Sedo\SedoTMP\Content\Model\MediaResourceResponse
```

Retrieve a media resource by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\MediaResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->mediaIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaResourcesApi->mediaIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\Content\Model\MediaResourceResponse**](../Model/MediaResourceResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `mediaPost()`

```php
mediaPost($file): \Sedo\SedoTMP\Content\Model\MediaResourceResponse
```

Create a new media resource

This endpoint allows you to add a new media resource to the system. When a media resource is added, it is stored in the system but not published to the content site.  **Permissions:** - Only users with sufficient permissions can perform this operation.  **Media Resources:** - Media resources are files that can be attached to articles to enhance their content. - These resources are stored in the system and can be reused across multiple articles.  **Usage:** - Media resources can be used when creating new articles. - When an article that includes a media resource is published, the media resource will also be published to the content site.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\Api\MediaResourcesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->mediaPost($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MediaResourcesApi->mediaPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**|  | [optional] |

### Return type

[**\Sedo\SedoTMP\Content\Model\MediaResourceResponse**](../Model/MediaResourceResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
