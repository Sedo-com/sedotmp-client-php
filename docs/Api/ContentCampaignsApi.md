# Sedo\SedoTMP\OpenApi\ContentCampaignsApi

All URIs are relative to https://api.sedotmp.com/platform/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contentCampaignsGet()**](ContentCampaignsApi.md#contentCampaignsGet) | **GET** /content-campaigns | Retrieve a list of content campaigns |
| [**contentCampaignsIdGet()**](ContentCampaignsApi.md#contentCampaignsIdGet) | **GET** /content-campaigns/{id} | Retrieve a content campaign by its ID |
| [**contentCampaignsIdPatch()**](ContentCampaignsApi.md#contentCampaignsIdPatch) | **PATCH** /content-campaigns/{id} | Retry a content campaign |
| [**contentCampaignsPost()**](ContentCampaignsApi.md#contentCampaignsPost) | **POST** /content-campaigns | Create a new content campaign |
| [**trackedContentOrdersGet()**](ContentCampaignsApi.md#trackedContentOrdersGet) | **GET** /tracked-content-orders | Retrieve a list of tracked content orders |
| [**trackedContentOrdersIdGet()**](ContentCampaignsApi.md#trackedContentOrdersIdGet) | **GET** /tracked-content-orders/{id} | Retrieve a tracked content order by its ID |
| [**trackedContentOrdersPost()**](ContentCampaignsApi.md#trackedContentOrdersPost) | **POST** /tracked-content-orders | Create a new tracked content order |


## `contentCampaignsGet()`

```php
contentCampaignsGet($page, $term): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse[]
```

Retrieve a list of content campaigns

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = array('key' => new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\Pageable()); // \Sedo\SedoTMP\OpenApi\Platform\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer+vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->contentCampaignsGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->contentCampaignsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse[]**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contentCampaignsIdGet()`

```php
contentCampaignsIdGet($id): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse
```

Retrieve a content campaign by its ID

This endpoint retrieves details of a specific content campaign by its ID. Since content campaign fulfillment may take some time, use this endpoint to check the status of your content campaign. Keep an eye on the status, article ID, campaign ID, and tracking URL in the content campaign.  Refer to the process description above for more information.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->contentCampaignsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->contentCampaignsIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contentCampaignsIdPatch()`

```php
contentCampaignsIdPatch($id, $contentCampaignsIdPatchRequest): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse
```

Retry a content campaign

This endpoint retries and existing content campaign in state PROCESSING_ERROR for a partner.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id
$contentCampaignsIdPatchRequest = new \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsIdPatchRequest(); // \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsIdPatchRequest

try {
    $result = $apiInstance->contentCampaignsIdPatch($id, $contentCampaignsIdPatchRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->contentCampaignsIdPatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |
| **contentCampaignsIdPatchRequest** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsIdPatchRequest**](../Model/ContentCampaignsIdPatchRequest.md)|  | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contentCampaignsPost()`

```php
contentCampaignsPost($contentCampaignsPostRequest): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse
```

Create a new content campaign

This endpoint creates a new content campaign for a partner, processed asynchronously. Refer to the process description above for details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$contentCampaignsPostRequest = new \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest(); // \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest

try {
    $result = $apiInstance->contentCampaignsPost($contentCampaignsPostRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->contentCampaignsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentCampaignsPostRequest** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest**](../Model/ContentCampaignsPostRequest.md)|  | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `trackedContentOrdersGet()`

```php
trackedContentOrdersGet($page, $term): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse[]
```

Retrieve a list of tracked content orders

Note: This endpoint is deprecated. Please use the content-campaigns corresponding endpoint instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = array('key' => new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\Pageable()); // \Sedo\SedoTMP\OpenApi\Platform\Model\Pageable | Pageable object (every key is a separate query parameter)
$term = summer+vacation; // string | Search term for matching against any text field e.g. ID, title, excerpt, text..

try {
    $result = $apiInstance->trackedContentOrdersGet($page, $term);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->trackedContentOrdersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Pageable**](../Model/.md)| Pageable object (every key is a separate query parameter) | [optional] |
| **term** | **string**| Search term for matching against any text field e.g. ID, title, excerpt, text.. | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse[]**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `trackedContentOrdersIdGet()`

```php
trackedContentOrdersIdGet($id): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse
```

Retrieve a tracked content order by its ID

This endpoint retrieves details of a specific tracked content order by its ID. Since order fulfillment may take some time, use this endpoint to check the status of your order. Keep an eye on the status, article ID, campaign ID, and tracking URL in the order.  Refer to the process description above for more information.  Note: This endpoint is deprecated. Please use the content-campaign corresponding endpoint instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | Resource id

try {
    $result = $apiInstance->trackedContentOrdersIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->trackedContentOrdersIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Resource id | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `trackedContentOrdersPost()`

```php
trackedContentOrdersPost($contentCampaignsPostRequest): \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse
```

Create a new tracked content order

This endpoint creates a new tracked content order for a partner, processed asynchronously. Refer to the process description above for details.  Note: This endpoint is deprecated. Please use the content-campaigns corresponding endpoint instead.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ContentCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$contentCampaignsPostRequest = new \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest(); // \Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest

try {
    $result = $apiInstance->trackedContentOrdersPost($contentCampaignsPostRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContentCampaignsApi->trackedContentOrdersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentCampaignsPostRequest** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest**](../Model/ContentCampaignsPostRequest.md)|  | |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponse**](../Model/ContentCampaignResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
