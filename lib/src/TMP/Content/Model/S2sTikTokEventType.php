<?php
/**
 * S2sTikTokEventType
 *
 * PHP version 5
 *
 * @category Class
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * platform-api
 *
 * # Introduction and Process Overview  This API helps manage content campaigns, reporting and other parts of Sedo Traffic Monetization Platform  *Note: Please note that the API is still in development and some endpoints may not be available yet.*  # Authentication The API uses a modern OAuth authentication process to ensure security without sacrificing simplicity. To access the API, you need an access token. For more details on authentication, please refer to the [Introduction](/cms/docs-api/introduction) section.  <!-- ReDoc-Inject: <security-definitions> -->
 *
 * OpenAPI spec version: 1.3.0
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.68
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Sedo\SedoTMP\Content\Model;
use \Sedo\ObjectSerializer;

/**
 * S2sTikTokEventType Class Doc Comment
 *
 * @category Class
 * @description Following events are supported by TikTok Conversion API and can be used for search, click, and landing page events.
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class S2sTikTokEventType
{
    /**
     * Possible values of this enum
     */
    const VIEW_CONTENT = 'ViewContent';
    const CLICK_BUTTON = 'ClickButton';
    const SEARCH = 'Search';
    const ADD_TO_WISHLIST = 'AddToWishlist';
    const ADD_TO_CART = 'AddToCart';
    const INITIATE_CHECKOUT = 'InitiateCheckout';
    const ADD_PAYMENT_INFO = 'AddPaymentInfo';
    const COMPLETE_PAYMENT = 'CompletePayment';
    const PLACE_AN_ORDER = 'PlaceAnOrder';
    const CONTACT = 'Contact';
    const DOWNLOAD = 'Download';
    const SUBMIT_FORM = 'SubmitForm';
    const COMPLETE_REGISTRATION = 'CompleteRegistration';
    const SUBSCRIBE = 'Subscribe';
    const CUSTOMIZE_PRODUCT = 'CustomizeProduct';
    const FIND_LOCATION = 'FindLocation';
    const SCHEDULE = 'Schedule';
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::VIEW_CONTENT,
            self::CLICK_BUTTON,
            self::SEARCH,
            self::ADD_TO_WISHLIST,
            self::ADD_TO_CART,
            self::INITIATE_CHECKOUT,
            self::ADD_PAYMENT_INFO,
            self::COMPLETE_PAYMENT,
            self::PLACE_AN_ORDER,
            self::CONTACT,
            self::DOWNLOAD,
            self::SUBMIT_FORM,
            self::COMPLETE_REGISTRATION,
            self::SUBSCRIBE,
            self::CUSTOMIZE_PRODUCT,
            self::FIND_LOCATION,
            self::SCHEDULE
        ];
    }
}
