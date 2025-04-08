# # UpdateArticle

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | Article title |
**excerpt** | **string** | Short excerpt of the text | [optional]
**text** | **string** | Full text content |
**categoryId** | **string** |  | [optional]
**tags** | **string[]** | List of tags that describe the article. These tags help categorize articles and group similar articles together.  Note:   * Tags do not affect the ads displayed. They should not be confused with ad keywords.   * Multiple tags should be sent as an array, not as a single long string. | [optional]
**country** | **string** | Audience country (ISO code) | [optional]
**locale** | **string** | Audience language (Language tag formatted) | [optional]
**images** | [**\Sedo\SedoTMP\OpenApi\Content\Model\ArticleImageReference[]**](ArticleImageReference.md) |  | [optional]
**partner** | **string** | Partner to assigned to the resource. Requires corresponding privileges | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
