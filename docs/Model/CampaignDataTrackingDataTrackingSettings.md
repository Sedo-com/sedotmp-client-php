# # CampaignDataTrackingDataTrackingSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pixelMetaPixelId** | **string** | Pixel ID from Meta Events Manager. See for more details: https://www.facebook.com/business/help/952192354843755?id&#x3D;1205376682832142  More details on how to set up the tracking can be found in the [Meta conversion tracking API documentation](https://developers.facebook.com/docs/marketing-api/conversions-api/get-started/) |
**pixelMetaLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**pixelMetaClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**pixelMetaSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**type** | **string** |  |
**s2sMetaToken** | **string** | Conversion API token | [optional]
**s2sMetaPixelId** | **string** | Pixel ID from Meta Events Manager. See for more details: https://www.facebook.com/business/help/952192354843755?id&#x3D;1205376682832142  More details on how to set up the tracking can be found in the [Meta conversion tracking API documentation](https://developers.facebook.com/docs/marketing-api/conversions-api/get-started/) | [optional]
**s2sMetaLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**s2sMetaClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**s2sMetaSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sOutbrainClickParam** | **string** | Follow the Outbrain guidelines to set up the Server-to-Server (S2S) Conversion in your Outbrain account: [Outbrain S2S Conversion Setup](https://www.outbrain.com/help/advertisers/server2server-integrations/)  This parameter is crucial for passing the Outbrain Click ID back to Outbrain, enabling effective tracking of your campaigns.  **Usage Instructions:**   1. When directing traffic to your RSoC articles, include the Outbrain Click ID in the URL using a parameter name of your choice.   2. Ensure that the parameter name in the URL aligns with the name configured in s2sObClickParam.  **Example:**  If your traffic URL is structured as follows: &#x60;https://your-rsoc-domain.com/?campaign&#x3D;1234&amp;ob_click_id&#x3D;23o4ij23o&#x60; Then, you should set the value of s2sTblClickParam to &#x60;ob_click_id&#x60;. This alignment guarantees proper tracking and reporting of your campaigns with Outbrain. |
**s2sOutbrainLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**s2sOutbrainSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sOutbrainClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**s2sSnapchatToken** | **string** | Conversion API token |
**s2sSnapchatPixelId** | **string** | Event Pixel ID from Snapchat Ads Manager  More details on how to set up the tracking can be found in the [Snapchat Ads Manager](https://forbusiness.snapchat.com/blog/the-snap-pixel-how-it-works-and-how-to-install-it#installation) |
**s2sSnapchatLandingPageEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sSnapchatEventType**](S2sSnapchatEventType.md) | Event name for the Landing Visit event | [optional]
**s2sSnapchatSearchEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sSnapchatEventType**](S2sSnapchatEventType.md) | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sSnapchatClickEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sSnapchatEventType**](S2sSnapchatEventType.md) | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**s2sTaboolaClickParam** | **string** | Follow the Taboola guidelines to set up the Server-to-Server (S2S) Conversion in your Taboola account: [Taboola S2S Conversion Setup0](https://help.taboola.com/hc/en-us/articles/115006850567-How-to-Track-Conversions-Using-Server-to-Server-Integration-S2S)  &#x60;s2sTaboolaClickParam&#x60; parameter is crucial for passing the Taboola Click ID back to Taboola, enabling effective tracking of your campaigns.  **Usage Instructions:**   1. When directing traffic to your RSoC articles, include the Taboola Click ID in the URL using a parameter name of your choice.   2. Ensure that the parameter name in the URL aligns with the name configured in s2sTaboolaClickParam.  **Example:**    If your traffic URL is structured as follows:   your-rsoc-domain.com/?campaign&#x3D;12&amp;taboola_click&#x3D;23o4ij23o   Then, you should set the value of &#x60;s2sTaboolaClickParam&#x60; to &#x60;taboola_click&#x60;. This alignment guarantees proper tracking and reporting of your campaigns with Taboola. |
**s2sTaboolaLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**s2sTaboolaSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sTaboolaClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**s2sTikTokToken** | **string** | This is the API token required for authentication with the TikTok API. Ensure that you generate and securely store this token to facilitate server-to-server interactions. |
**s2sTikTokPixelId** | **string** | This is the Event Pixel ID obtained from the TikTok Tracking section. It is essential for tracking user interactions on your landing pages.  For generating your Pixel ID, refer to the following resources:   [Get Started with Pixel](https://ads.tiktok.com/help/article/get-started-pixel)   [Pixel Sharing in Business Center](https://ads.tiktok.com/help/article/pixel-sharing-business-center)  Note: Make sure to configure the appropriate permissions in your TikTok account for the pixel to function correctly. |
**s2sTikTokLandingPageEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Landing Visit event | [optional]
**s2sTikTokSearchEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sTikTokClickEvent** | [**\Sedo\SedoTMP\OpenApi\Platform\Model\S2sTikTokEventType**](S2sTikTokEventType.md) | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**s2sXPixelId** | **string** | This parameter represents the Event Pixel ID obtained from the Twitter (X) Events Manager. It is essential for tracking user interactions and conversions.  For detailed guidance on setting up and using the pixel, please refer to the official documentation: [Twitter (X) Conversion API](https://developer.x.com/en/docs/x-ads-api/measurement/web-conversions/conversion-api) |
**s2sXLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**s2sXSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sXClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
