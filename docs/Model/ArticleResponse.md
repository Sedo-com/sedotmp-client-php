# # ArticleResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**title** | **string** | Article title | [optional]
**excerpt** | **string** | Short excerpt of the text | [optional]
**text** | **string** | Full text content | [optional]
**categoryId** | **string** |  | [optional]
**tags** | **string[]** | List of tags that describe the article. These tags help categorize articles and group similar articles together.  Note:   * Tags do not affect the ads displayed. They should not be confused with ad keywords.   * Multiple tags should be sent as an array, not as a single long string. | [optional]
**contentPhrases** | **string[]** | List of phrases to enhance the generated content | [optional]
**country** | **string** | Audience country (ISO code) | [optional]
**locale** | **string** | Audience language (Language tag formatted) | [optional]
**createdDate** | **\DateTime** | ISO-8601 formatted timestamp | [optional]
**lastModifiedDate** | **\DateTime** | ISO-8601 formatted timestamp | [optional]
**partner** | **string** | Partner to assigned to the resource. Requires corresponding privileges | [optional]
**createdBy** | **string** | Username of the user who operated on the resource | [optional]
**lastModifiedBy** | **string** | Username of the user who operated on the resource | [optional]
**images** | [**\Sedo\SedoTMP\OpenApi\Content\Model\ArticleImage[]**](ArticleImage.md) |  | [optional]
**topics** | **string[]** | List of topics used to generate the article | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
