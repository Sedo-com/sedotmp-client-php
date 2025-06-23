# # S2sTaboolaTrackingSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**s2sTaboolaClickParam** | **string** | Follow the Taboola guidelines to set up the Server-to-Server (S2S) Conversion in your Taboola account: [Taboola S2S Conversion Setup0](https://help.taboola.com/hc/en-us/articles/115006850567-How-to-Track-Conversions-Using-Server-to-Server-Integration-S2S)  &#x60;s2sTaboolaClickParam&#x60; parameter is crucial for passing the Taboola Click ID back to Taboola, enabling effective tracking of your campaigns.  **Usage Instructions:**   1. When directing traffic to your RSoC articles, include the Taboola Click ID in the URL using a parameter name of your choice.   2. Ensure that the parameter name in the URL aligns with the name configured in s2sTaboolaClickParam.  **Example:**    If your traffic URL is structured as follows:   your-rsoc-domain.com/?campaign&#x3D;12&amp;taboola_click&#x3D;23o4ij23o   Then, you should set the value of &#x60;s2sTaboolaClickParam&#x60; to &#x60;taboola_click&#x60;. This alignment guarantees proper tracking and reporting of your campaigns with Taboola. |
**s2sTaboolaLandingPageEvent** | **string** | Event name for the Landing Visit event | [optional]
**s2sTaboolaSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sTaboolaClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**type** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
