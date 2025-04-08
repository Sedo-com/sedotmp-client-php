# # S2sTikTokTrackingSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**s2sTikTokToken** | **string** | This is the API token required for authentication with the TikTok API. Ensure that you generate and securely store this token to facilitate server-to-server interactions. |
**s2sTikTokPixelId** | **string** | This is the Event Pixel ID obtained from the TikTok Tracking section. It is essential for tracking user interactions on your landing pages.  For generating your Pixel ID, refer to the following resources:   [Get Started with Pixel](https://ads.tiktok.com/help/article/get-started-pixel)   [Pixel Sharing in Business Center](https://ads.tiktok.com/help/article/pixel-sharing-business-center)  Note: Make sure to configure the appropriate permissions in your TikTok account for the pixel to function correctly. |
**s2sTikTokLandingPageEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Landing Visit event. | [optional]
**s2sTikTokSearchEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sTikTokClickEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**type** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
