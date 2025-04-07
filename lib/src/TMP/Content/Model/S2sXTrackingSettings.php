<?php
/**
 * S2sXTrackingSettings
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
 * S2sXTrackingSettings Class Doc Comment
 *
 * @category Class
 * @description Settings for tracking with Twitter (X)  traffic source.  For detailed guidance on setting up and using the pixel, please refer to the official documentation: [Twitter (X) Conversion API](https://developer.x.com/en/docs/x-ads-api/measurement/web-conversions/conversion-api).
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class S2sXTrackingSettings implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'S2sXTrackingSettings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        's2sXPixelId' => 'string',
        's2sXLandingPageEvent' => 'string',
        's2sXSearchEvent' => 'string',
        's2sXClickEvent' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        's2sXPixelId' => null,
        's2sXLandingPageEvent' => null,
        's2sXSearchEvent' => null,
        's2sXClickEvent' => null,
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
        's2sXPixelId' => 's2sXPixelId',
        's2sXLandingPageEvent' => 's2sXLandingPageEvent',
        's2sXSearchEvent' => 's2sXSearchEvent',
        's2sXClickEvent' => 's2sXClickEvent',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        's2sXPixelId' => 'setS2sXPixelId',
        's2sXLandingPageEvent' => 'setS2sXLandingPageEvent',
        's2sXSearchEvent' => 'setS2sXSearchEvent',
        's2sXClickEvent' => 'setS2sXClickEvent',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        's2sXPixelId' => 'getS2sXPixelId',
        's2sXLandingPageEvent' => 'getS2sXLandingPageEvent',
        's2sXSearchEvent' => 'getS2sXSearchEvent',
        's2sXClickEvent' => 'getS2sXClickEvent',
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
        $this->container['s2sXPixelId'] = isset($data['s2sXPixelId']) ? $data['s2sXPixelId'] : null;
        $this->container['s2sXLandingPageEvent'] = isset($data['s2sXLandingPageEvent']) ? $data['s2sXLandingPageEvent'] : null;
        $this->container['s2sXSearchEvent'] = isset($data['s2sXSearchEvent']) ? $data['s2sXSearchEvent'] : null;
        $this->container['s2sXClickEvent'] = isset($data['s2sXClickEvent']) ? $data['s2sXClickEvent'] : null;
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

        if ($this->container['s2sXPixelId'] === null) {
            $invalidProperties[] = "'s2sXPixelId' can't be null";
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
     * Gets s2sXPixelId
     *
     * @return string
     */
    public function getS2sXPixelId()
    {
        return $this->container['s2sXPixelId'];
    }

    /**
     * Sets s2sXPixelId
     *
     * @param string $s2sXPixelId This parameter represents the Event Pixel ID obtained from the Twitter (X) Events Manager. It is essential for tracking user interactions and conversions.  For detailed guidance on setting up and using the pixel, please refer to the official documentation: [Twitter (X) Conversion API](https://developer.x.com/en/docs/x-ads-api/measurement/web-conversions/conversion-api)
     *
     * @return $this
     */
    public function setS2sXPixelId($s2sXPixelId)
    {
        $this->container['s2sXPixelId'] = $s2sXPixelId;

        return $this;
    }

    /**
     * Gets s2sXLandingPageEvent
     *
     * @return string
     */
    public function getS2sXLandingPageEvent()
    {
        return $this->container['s2sXLandingPageEvent'];
    }

    /**
     * Sets s2sXLandingPageEvent
     *
     * @param string $s2sXLandingPageEvent Event name for the Landing Visit event.
     *
     * @return $this
     */
    public function setS2sXLandingPageEvent($s2sXLandingPageEvent)
    {
        $this->container['s2sXLandingPageEvent'] = $s2sXLandingPageEvent;

        return $this;
    }

    /**
     * Gets s2sXSearchEvent
     *
     * @return string
     */
    public function getS2sXSearchEvent()
    {
        return $this->container['s2sXSearchEvent'];
    }

    /**
     * Sets s2sXSearchEvent
     *
     * @param string $s2sXSearchEvent Event name for the Search event. Can be used for tracking \"1st\" click
     *
     * @return $this
     */
    public function setS2sXSearchEvent($s2sXSearchEvent)
    {
        $this->container['s2sXSearchEvent'] = $s2sXSearchEvent;

        return $this;
    }

    /**
     * Gets s2sXClickEvent
     *
     * @return string
     */
    public function getS2sXClickEvent()
    {
        return $this->container['s2sXClickEvent'];
    }

    /**
     * Sets s2sXClickEvent
     *
     * @param string $s2sXClickEvent Event name for the Ad Click or \"2nd\" click event. Commonly used for conversion tracking
     *
     * @return $this
     */
    public function setS2sXClickEvent($s2sXClickEvent)
    {
        $this->container['s2sXClickEvent'] = $s2sXClickEvent;

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
