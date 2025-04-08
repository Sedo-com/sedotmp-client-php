# # PublishedArticleResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**domain** | **string** |  | [optional]
**url** | **string** | The published article url | [optional]
**slug** | **string** | Slug of the published article | [optional]
**publishedId** | **string** |  | [optional]
**articleId** | **string** |  | [optional]
**publishedDate** | **\DateTime** | ISO-8601 formatted timestamp | [optional]
**publishedStatus** | **string** |  | [optional]
**publishedBy** | **string** | Username of the user who operated on the resource | [optional]
**title** | **string** | Article title |
**excerpt** | **string** | Short excerpt of the text | [optional]
**text** | **string** | Full text content |
**categoryId** | **string** |  | [optional]
**tags** | **string[]** | List of tags that describe the article. These tags help categorize articles and group similar articles together.  Note:   * Tags do not affect the ads displayed. They should not be confused with ad keywords.   * Multiple tags should be sent as an array, not as a single long string. | [optional]
**locale** | **string** | Audience language (Language tag formatted) | [optional]
**createdDate** | **\DateTime** | ISO-8601 formatted timestamp | [optional]
**lastModifiedDate** | **\DateTime** | ISO-8601 formatted timestamp | [optional]
**partner** | **string** | Partner to assigned to the resource. Requires corresponding privileges | [optional]
**createdBy** | **string** | Username of the user who operated on the resource | [optional]
**lastModifiedBy** | **string** | Username of the user who operated on the resource | [optional]
**images** | [**\Sedo\SedoTMP\Content\Model\ArticleImage[]**](ArticleImage.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
