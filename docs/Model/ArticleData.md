# # ArticleData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**country** | **string** | Audience country (ISO code) | [optional]
**locale** | **string** | Audience language (Language tag formatted) | [optional]
**featuredImage** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ArticleDataFeaturedImage**](ArticleDataFeaturedImage.md) |  | [optional]
**title** | **string** |  | [optional]
**excerpt** | **string** |  | [optional]
**topics** | **string[]** | The topic to generate article about | [optional]
**contentPhrases** | **string[]** | - Content Phrases: This field allows partners to provide up to 5 key phrases that guide the content generation process. These phrases should expand on the content introduction while keeping the article aligned with the ad. For example, if the ad promotes \&quot;weight loss\&quot; the article should provide detailed weight loss advice, not general health tips or unrelated topics. - Usage: Generate 1-5 key phrases that expand on the content intro while keeping the article aligned with the ad. Ensure these phrases guide the creation of informative and well-structured sections that fully support the main topic. - Guidelines: Keep the content original, accurate, and relevant to the reader. Avoid making exaggerated claims or misleading statements. | [optional]
**categoryId** | **string** | Which category id does article belong to. List of available categories can be fetched from Content API categories endpoint. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
