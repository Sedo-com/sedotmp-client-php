# # ContentCampaignResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**partner** | **string** | Partner assigned to the resource. Requires corresponding privileges | [optional]
**trackingUrl** | **string** |  | [optional]
**publishDomainName** | **string** | Article is or will be published on this domain  List of available domains can be found by using content api or portal website | [optional]
**article** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponseArticle**](ContentCampaignResponseArticle.md) |  | [optional]
**campaign** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignResponseCampaign**](ContentCampaignResponseCampaign.md) |  | [optional]
**status** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignStatus**](ContentCampaignStatus.md) |  | [optional]
**processingErrorDetails** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Problem**](Problem.md) |  | [optional]
**createdDate** | **\DateTime** | Timestamp in UTC | [optional]
**createdBy** | **string** | Authenticated user name | [optional]
**lastModifiedDate** | **\DateTime** | Timestamp in UTC | [optional]
**lastModifiedBy** | **string** | Authenticated user name | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
