# Sedo\SedoTMP\OpenApi\ReportsApi

All URIs are relative to https://api.sedotmp.com/platform/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**campaignReportGet()**](ReportsApi.md#campaignReportGet) | **GET** /campaign-report | Retrieve a Campaign Report |
| [**keywordPerformanceReportGet()**](ReportsApi.md#keywordPerformanceReportGet) | **GET** /keyword-performance-report | Retrieve a Keyword Performance Report |


## `campaignReportGet()`

```php
campaignReportGet($dimensions, $filter, $sort, $pagination): \Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReport
```

Retrieve a Campaign Report

Our advanced reporting system provides detailed data on campaign performance, offering insights into key metrics across various dimensions such as campaign ID, geographic locations, and devices. This enables you to accurately compare revenue with ad spend on traffic sources and marketing strategies in near real-time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dimensions = array(new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportDimension()); // \Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportDimension[] | The dimensions to include in the report
$filter = new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportFilter(); // \Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportFilter | Filter object, must be sent as a url-encoded JSON string
$sort = {"sort":"CLICKS,asc"}; // \Sedo\SedoTMP\OpenApi\Platform\Model\Sort | Sort object (every key is a separate query parameter)  Available fields for sorting: RELATED_LINKS_REQUESTS, RELATED_LINKS_IMPRESSIONS, RELATED_LINKS_CLICKS, RELATED_LINKS_RPM, AD_REQUESTS, MATCHED_AD_REQUESTS, AD_IMPRESSIONS, IMPRESSIONS, CLICKS, CTR, AD_CTR, CPC, AD_RPM, CONVERSION_RATE, REVENUE, DATE, HOUR, PARTNER, CAMPAIGN_ID, COUNTRY, DEVICE_TYPE
$pagination = {"offset":0,"limit":100}; // \Sedo\SedoTMP\OpenApi\Platform\Model\Pagination | [Pagination parameters](#model-Pagination). Use one of the following methods:   - `offset` and `limit` for offset-based pagination   - `page` and `size` for page-based pagination

try {
    $result = $apiInstance->campaignReportGet($dimensions, $filter, $sort, $pagination);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->campaignReportGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dimensions** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportDimension[]**](../Model/\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportDimension.md)| The dimensions to include in the report | [optional] |
| **filter** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReportFilter**](../Model/.md)| Filter object, must be sent as a url-encoded JSON string | [optional] |
| **sort** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Sort**](../Model/.md)| Sort object (every key is a separate query parameter)  Available fields for sorting: RELATED_LINKS_REQUESTS, RELATED_LINKS_IMPRESSIONS, RELATED_LINKS_CLICKS, RELATED_LINKS_RPM, AD_REQUESTS, MATCHED_AD_REQUESTS, AD_IMPRESSIONS, IMPRESSIONS, CLICKS, CTR, AD_CTR, CPC, AD_RPM, CONVERSION_RATE, REVENUE, DATE, HOUR, PARTNER, CAMPAIGN_ID, COUNTRY, DEVICE_TYPE | [optional] |
| **pagination** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Pagination**](../Model/.md)| [Pagination parameters](#model-Pagination). Use one of the following methods:   - &#x60;offset&#x60; and &#x60;limit&#x60; for offset-based pagination   - &#x60;page&#x60; and &#x60;size&#x60; for page-based pagination | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignReport**](../Model/CampaignReport.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/x-ndjson`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `keywordPerformanceReportGet()`

```php
keywordPerformanceReportGet($dimensions, $filter, $sort, $pagination): \Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReport
```

Retrieve a Keyword Performance Report

The Keyword Performance Report provides a comprehensive breakdown of keyword performance, allowing you to optimize keywords efficiently to improve ROI. The report is grouped by keywords and can be filtered by additional dimensions, such as country, device type, and more.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = Sedo\SedoTMP\OpenApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Sedo\SedoTMP\OpenApi\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dimensions = array(new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportDimension()); // \Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportDimension[] | The dimensions to include in the report
$filter = new \Sedo\SedoTMP\OpenApi\Platform\Model\\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportFilter(); // \Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportFilter | Filter object, must be sent as a url-encoded JSON string
$sort = {"sort":"CLICKS,asc"}; // \Sedo\SedoTMP\OpenApi\Platform\Model\Sort | Sort object (every key is a separate query parameter)  Available fields for sorting: CLICKS, SEARCHES, COVERAGE, COVERAGE_PERCENT, ESTIMATED_REVENUE, CTR, ESTIMATED_CPC, DATE, PARTNER, CAMPAIGN_ID, COUNTRY, DEVICE_TYPE, KEYWORDS
$pagination = {"offset":0,"limit":100}; // \Sedo\SedoTMP\OpenApi\Platform\Model\Pagination | [Pagination parameters](#model-Pagination). Use one of the following methods:   - `offset` and `limit` for offset-based pagination   - `page` and `size` for page-based pagination

try {
    $result = $apiInstance->keywordPerformanceReportGet($dimensions, $filter, $sort, $pagination);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->keywordPerformanceReportGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dimensions** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportDimension[]**](../Model/\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportDimension.md)| The dimensions to include in the report | [optional] |
| **filter** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReportFilter**](../Model/.md)| Filter object, must be sent as a url-encoded JSON string | [optional] |
| **sort** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Sort**](../Model/.md)| Sort object (every key is a separate query parameter)  Available fields for sorting: CLICKS, SEARCHES, COVERAGE, COVERAGE_PERCENT, ESTIMATED_REVENUE, CTR, ESTIMATED_CPC, DATE, PARTNER, CAMPAIGN_ID, COUNTRY, DEVICE_TYPE, KEYWORDS | [optional] |
| **pagination** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Pagination**](../Model/.md)| [Pagination parameters](#model-Pagination). Use one of the following methods:   - &#x60;offset&#x60; and &#x60;limit&#x60; for offset-based pagination   - &#x60;page&#x60; and &#x60;size&#x60; for page-based pagination | [optional] |

### Return type

[**\Sedo\SedoTMP\OpenApi\Platform\Model\KeywordPerformanceReport**](../Model/KeywordPerformanceReport.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/x-ndjson`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
