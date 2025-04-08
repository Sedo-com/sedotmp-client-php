# # CampaignDataTrackingData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**trafficSource** | **string** | Traffic source is important for tracking conversions |
**trackingSettings** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\CampaignDataTrackingDataTrackingSettings**](CampaignDataTrackingDataTrackingSettings.md) |  | [optional]
**trackingMethod** | **string** | Tracking method: currently only S2S is supported. |
**postbacks** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\Postback[]**](Postback.md) | Define postbacks for events.  **Implementation Guidelines:** - For each event maximum one postback can be defined. - Ensure that the Click ID parameter in clickIdParam matches the one used in url. - Use {click_id} consistently for accurate conversion tracking. - Leverage additional macros to optimize tracking and reporting. - Test your postback setup before launching campaigns. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
