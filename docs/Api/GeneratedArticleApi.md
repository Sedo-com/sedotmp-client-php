# Sedo\GeneratedArticleApi

All URIs are relative to https://api.sedotmp.com/content/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generatedArticlesPost()**](GeneratedArticleApi.md#generatedArticlesPost) | **POST** /generated-articles | Generate a new article for a specified topic |


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


$apiInstance = new Sedo\Api\GeneratedArticleApi(
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
    echo 'Exception when calling GeneratedArticleApi->generatedArticlesPost: ', $e->getMessage(), PHP_EOL;
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
