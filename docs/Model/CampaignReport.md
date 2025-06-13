# # CampaignReport

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**partner** | **string** | Partner assigned to the resource. Requires corresponding privileges | [optional]
**date** | **\DateTime** | Date | [optional]
**hour** | **int** |  | [optional]
**campaignId** | **string** |  | [optional]
**campaignName** | **string** |  | [optional]
**country** | **string** | Audience country (ISO code) | [optional]
**deviceType** | **string** |  | [optional]
**relatedLinksRequests** | **int** | A funnel request is counted whenever your site requests to display a non-ad unit (for example, a related search unit). We report a funnel request each time a request was sent, even if nothing was returned or rendered on the page. | [optional]
**relatedLinksImpressions** | **int** | A funnel impression is counted for each funnel request that returned some content that was shown to the user. | [optional]
**relatedLinksClicks** | **int** | A funnel click is counted when a user clicks on a non-ad unit and some action is triggered. For example, the user clicks a related search term inside a related search unit and is taken to a search landing page. | [optional]
**relatedLinksRpm** | **float** | Ad revenue per thousand funnel impressions is calculated by dividing your estimated earnings resulting from a funnel request by the number of funnel impressions that you received, then multiplying by 1,000.  Funnel RPM &#x3D; (Estimated earnings resulting from the funnel / funnel impressions) * 1,000 | [optional]
**adRequests** | **int** | An ad request is counted whenever an ad unit on your site requests ads to be displayed. It is the number of ad units that requested ads (for content ads) or search queries (for search ads). We report an ad request each time a request was sent, even if no ads were returned and public service ads or backup ads were displayed instead. | [optional]
**matchedAdRequests** | **int** | A matched request is counted for each ad request that returns at least one ad to the site. It&#39;s the number of ad units (for content ads) or search queries (for search ads) that showed ads. | [optional]
**adImpressions** | **int** | An ad impression is reported whenever an ad has been downloaded to the user&#39;s device and has begun to load. Different ad formats display varying numbers of ads, for example, each time a vertical banner appears on your site you&#39;ll see two ad impressions in your reports. | [optional]
**impressions** | **int** | An impression is counted for each ad request where at least one ad has begun to load on the user&#39;s device. It&#39;s the number of ad units (for content ads) or search queries (for search ads) that loaded ads. | [optional]
**clicks** | **int** | The number of times that a user clicked on an ad | [optional]
**ctr** | **float** | The click-through rate is the percentage of impressions that led to a click.  CTR &#x3D; Clicks/Impression | [optional]
**adCtr** | **float** | The ad click-through rate is the number of ad clicks divided by the number of impressions for the page of ads that appears when a link unit is clicked. | [optional]
**cpc** | **float** | The cost per click is the amount that you earn each time a user clicks on your ad. In your reports, CPC is calculated by dividing the estimated earnings by the number of clicks received. | [optional]
**adRpm** | **float** | Ad revenue per thousand impressions (RPM) is calculated by dividing your estimated earnings by the number of ad impressions that you received, then multiplying by 1000.  Ad RPM &#x3D; (Estimated earnings/Ad impressions) * 1000 | [optional]
**conversionRate** | **float** | Ad Clicks / Related Links Requests (full funnel conversion rate) | [optional]
**revenue** | **float** | Your account balance for the time period selected This amount is an estimate that is subject to change when your earnings are verified for accuracy at the end of every month. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
