# # S2sOutbrainTrackingSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**s2sOutbrainClickParam** | **string** | Follow the Outbrain guidelines to set up the Server-to-Server (S2S) Conversion in your Outbrain account: [Outbrain S2S Conversion Setup](https://www.outbrain.com/help/advertisers/server2server-integrations/)  This parameter is crucial for passing the Outbrain Click ID back to Outbrain, enabling effective tracking of your campaigns.  **Usage Instructions:**   1. When directing traffic to your RSoC articles, include the Outbrain Click ID in the URL using a parameter name of your choice.   2. Ensure that the parameter name in the URL aligns with the name configured in s2sObClickParam.  **Example:**  If your traffic URL is structured as follows: &#x60;https://your-rsoc-domain.com/?campaign&#x3D;1234&amp;ob_click_id&#x3D;23o4ij23o&#x60; Then, you should set the value of s2sTblClickParam to &#x60;ob_click_id&#x60;. This alignment guarantees proper tracking and reporting of your campaigns with Outbrain. |
**s2sOutbrainLandingPageEvent** | **string** | Event name for the Landing Visit event. | [optional]
**s2sOutbrainSearchEvent** | **string** | Event name for the Search event. Can be used for tracking \&quot;1st\&quot; click | [optional]
**s2sOutbrainClickEvent** | **string** | Event name for the Ad Click or \&quot;2nd\&quot; click event. Commonly used for conversion tracking | [optional]
**type** | **string** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
