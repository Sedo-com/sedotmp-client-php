<?php
/**
 * S2sTikTokTrackingSettings
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

use \ArrayAccess;
use \Sedo\ObjectSerializer;

/**
 * S2sTikTokTrackingSettings Class Doc Comment
 *
 * @category Class
 * @description Settings for tracking with TikTok traffic source.
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class S2sTikTokTrackingSettings implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'S2sTikTokTrackingSettings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        's2sTikTokToken' => 'string',
        's2sTikTokPixelId' => 'string',
        's2sTikTokLandingPageEvent' => 'AllOfS2sTikTokTrackingSettingsS2sTikTokLandingPageEvent',
        's2sTikTokSearchEvent' => 'AllOfS2sTikTokTrackingSettingsS2sTikTokSearchEvent',
        's2sTikTokClickEvent' => 'AllOfS2sTikTokTrackingSettingsS2sTikTokClickEvent',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        's2sTikTokToken' => null,
        's2sTikTokPixelId' => null,
        's2sTikTokLandingPageEvent' => null,
        's2sTikTokSearchEvent' => null,
        's2sTikTokClickEvent' => null,
        'type' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        's2sTikTokToken' => 's2sTikTokToken',
        's2sTikTokPixelId' => 's2sTikTokPixelId',
        's2sTikTokLandingPageEvent' => 's2sTikTokLandingPageEvent',
        's2sTikTokSearchEvent' => 's2sTikTokSearchEvent',
        's2sTikTokClickEvent' => 's2sTikTokClickEvent',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        's2sTikTokToken' => 'setS2sTikTokToken',
        's2sTikTokPixelId' => 'setS2sTikTokPixelId',
        's2sTikTokLandingPageEvent' => 'setS2sTikTokLandingPageEvent',
        's2sTikTokSearchEvent' => 'setS2sTikTokSearchEvent',
        's2sTikTokClickEvent' => 'setS2sTikTokClickEvent',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        's2sTikTokToken' => 'getS2sTikTokToken',
        's2sTikTokPixelId' => 'getS2sTikTokPixelId',
        's2sTikTokLandingPageEvent' => 'getS2sTikTokLandingPageEvent',
        's2sTikTokSearchEvent' => 'getS2sTikTokSearchEvent',
        's2sTikTokClickEvent' => 'getS2sTikTokClickEvent',
        'type' => 'getType'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['s2sTikTokToken'] = isset($data['s2sTikTokToken']) ? $data['s2sTikTokToken'] : null;
        $this->container['s2sTikTokPixelId'] = isset($data['s2sTikTokPixelId']) ? $data['s2sTikTokPixelId'] : null;
        $this->container['s2sTikTokLandingPageEvent'] = isset($data['s2sTikTokLandingPageEvent']) ? $data['s2sTikTokLandingPageEvent'] : null;
        $this->container['s2sTikTokSearchEvent'] = isset($data['s2sTikTokSearchEvent']) ? $data['s2sTikTokSearchEvent'] : null;
        $this->container['s2sTikTokClickEvent'] = isset($data['s2sTikTokClickEvent']) ? $data['s2sTikTokClickEvent'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['s2sTikTokToken'] === null) {
            $invalidProperties[] = "'s2sTikTokToken' can't be null";
        }
        if ($this->container['s2sTikTokPixelId'] === null) {
            $invalidProperties[] = "'s2sTikTokPixelId' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets s2sTikTokToken
     *
     * @return string
     */
    public function getS2sTikTokToken()
    {
        return $this->container['s2sTikTokToken'];
    }

    /**
     * Sets s2sTikTokToken
     *
     * @param string $s2sTikTokToken This is the API token required for authentication with the TikTok API. Ensure that you generate and securely store this token to facilitate server-to-server interactions.
     *
     * @return $this
     */
    public function setS2sTikTokToken($s2sTikTokToken)
    {
        $this->container['s2sTikTokToken'] = $s2sTikTokToken;

        return $this;
    }

    /**
     * Gets s2sTikTokPixelId
     *
     * @return string
     */
    public function getS2sTikTokPixelId()
    {
        return $this->container['s2sTikTokPixelId'];
    }

    /**
     * Sets s2sTikTokPixelId
     *
     * @param string $s2sTikTokPixelId This is the Event Pixel ID obtained from the TikTok Tracking section. It is essential for tracking user interactions on your landing pages.  For generating your Pixel ID, refer to the following resources:   [Get Started with Pixel](https://ads.tiktok.com/help/article/get-started-pixel)   [Pixel Sharing in Business Center](https://ads.tiktok.com/help/article/pixel-sharing-business-center)  Note: Make sure to configure the appropriate permissions in your TikTok account for the pixel to function correctly.
     *
     * @return $this
     */
    public function setS2sTikTokPixelId($s2sTikTokPixelId)
    {
        $this->container['s2sTikTokPixelId'] = $s2sTikTokPixelId;

        return $this;
    }

    /**
     * Gets s2sTikTokLandingPageEvent
     *
     * @return AllOfS2sTikTokTrackingSettingsS2sTikTokLandingPageEvent
     */
    public function getS2sTikTokLandingPageEvent()
    {
        return $this->container['s2sTikTokLandingPageEvent'];
    }

    /**
     * Sets s2sTikTokLandingPageEvent
     *
     * @param AllOfS2sTikTokTrackingSettingsS2sTikTokLandingPageEvent $s2sTikTokLandingPageEvent Event name for the Landing Visit event.
     *
     * @return $this
     */
    public function setS2sTikTokLandingPageEvent($s2sTikTokLandingPageEvent)
    {
        $this->container['s2sTikTokLandingPageEvent'] = $s2sTikTokLandingPageEvent;

        return $this;
    }

    /**
     * Gets s2sTikTokSearchEvent
     *
     * @return AllOfS2sTikTokTrackingSettingsS2sTikTokSearchEvent
     */
    public function getS2sTikTokSearchEvent()
    {
        return $this->container['s2sTikTokSearchEvent'];
    }

    /**
     * Sets s2sTikTokSearchEvent
     *
     * @param AllOfS2sTikTokTrackingSettingsS2sTikTokSearchEvent $s2sTikTokSearchEvent Event name for the Search event. Can be used for tracking \"1st\" click
     *
     * @return $this
     */
    public function setS2sTikTokSearchEvent($s2sTikTokSearchEvent)
    {
        $this->container['s2sTikTokSearchEvent'] = $s2sTikTokSearchEvent;

        return $this;
    }

    /**
     * Gets s2sTikTokClickEvent
     *
     * @return AllOfS2sTikTokTrackingSettingsS2sTikTokClickEvent
     */
    public function getS2sTikTokClickEvent()
    {
        return $this->container['s2sTikTokClickEvent'];
    }

    /**
     * Sets s2sTikTokClickEvent
     *
     * @param AllOfS2sTikTokTrackingSettingsS2sTikTokClickEvent $s2sTikTokClickEvent Event name for the Ad Click or \"2nd\" click event. Commonly used for conversion tracking
     *
     * @return $this
     */
    public function setS2sTikTokClickEvent($s2sTikTokClickEvent)
    {
        $this->container['s2sTikTokClickEvent'] = $s2sTikTokClickEvent;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
