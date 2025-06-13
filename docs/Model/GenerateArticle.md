# # GenerateArticle

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**topics** | **string[]** | The topic to generate article about |
**title** | **string** | Article title | [optional]
**excerpt** | **string** | Short excerpt of the text | [optional]
**country** | **string** | Audience country (ISO code) | [optional]
**locale** | **string** | Audience language (Language tag formatted) | [optional]
**categoryId** | **string** | **Category Assignment:** If &#x60;categoryId&#x60; is not included in the request field in the request body, we will try to find a suitable category for the generated article based on the text and title from the existing categories in the system. | [optional]
**tags** | **string[]** | List of tags that describe the article. These tags help categorize articles and group similar articles together.  Note:   * Tags do not affect the ads displayed. They should not be confused with ad keywords.   * Multiple tags should be sent as an array, not as a single long string. | [optional]
**contentPhrases** | **string[]** | List of phrases to enhance the generated content | [optional]
**autoPublish** | [**\Sedo\SedoTMP\OpenApi\Content\Model\AutoPublish**](AutoPublish.md) |  | [optional]
**generateImage** | [**\Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticleGenerateImage**](GenerateArticleGenerateImage.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
