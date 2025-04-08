# # Postback

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eventName** | **string** | The name of the event for which the postback URL will be called |
**url** | **string** | Every click conversion is sent to this URL for accurate tracking and attribution. It should include the Click ID parameter you use when sending traffic to SedoTMP. URL will be called using HTTP GET.  ### Additional Tracking Macros You can dynamically append extra parameters to the postback URL using the following macros. This allows better tracking of conversions and payouts.  Macro            | Description  | Example -----------------|--------------|----------- {campaign}       | Campaign ID  | 12345 {click_id}       | Click ID for conversion tracking. Important: attach always the same parameter name to the traffic URL when sending traffic to SedoTMP. | abc123xyz {epayout}        | Estimated payout amount | 0.123 {country}        | 2-letter ISO country code | US {country_name}   | Full country name | United States {state}          | State code or name | CA / California {city}           | City name | Los Angeles {zip}            | ZIP/postal code | 90001 {os_type}        | Visitor&#39;s operating system | WINDOWS {browser}        | Visitor&#39;s browser type | CHROME {device_type}    | Device type (Mobile/Desktop) | MOBILE {device_brand}   | Device brand | APPLE |
**clickIdParam** | **string** | Used to define a custom parameter name for passing your (or your traffic source) Click ID. This same parameter name must be included in the url when sending traffic to SedoTMP. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
