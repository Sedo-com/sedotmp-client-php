<?php

/**
 * S2sSnapchatTrackingSettings.
 *
 * PHP version 8.1
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

/**
 * platform-api.
 *
 * # Introduction and Process Overview  This API helps manage content campaigns, reporting and other parts of Sedo Traffic Monetization Platform  *Note: Please note that the API is still in development and some endpoints may not be available yet.*  # Authentication The API uses a modern OAuth authentication process to ensure security without sacrificing simplicity. To access the API, you need an access token. For more details on authentication, please refer to the [Introduction](/cms/docs-api/introduction) section.  <!-- ReDoc-Inject: <security-definitions> -->
 *
 * The version of the OpenAPI document: 1.3.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Sedo\SedoTMP\Platform\Model;

use Sedo\ObjectSerializer;

/**
 * S2sSnapchatTrackingSettings Class Doc Comment.
 *
 * @category Class
 *
 * @description Settings for tracking with Snapchat traffic source.  More details on how to set up the tracking can be found in the [Snapchat Ads Manager](https://forbusiness.snapchat.com/blog/the-snap-pixel-how-it-works-and-how-to-install-it#installation)
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 *
 * @implements \ArrayAccess<string, mixed>
 */
class S2sSnapchatTrackingSettings implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'S2sSnapchatTrackingSettings';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        's2sSnapchatToken' => 'string',
        's2sSnapchatPixelId' => 'string',
        's2sSnapchatLandingPageEvent' => '\Sedo\SedoTMP\Platform\Model\S2sSnapchatEventType',
        's2sSnapchatSearchEvent' => '\Sedo\SedoTMP\Platform\Model\S2sSnapchatEventType',
        's2sSnapchatClickEvent' => '\Sedo\SedoTMP\Platform\Model\S2sSnapchatEventType',
        'type' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     *
     * @phpstan-var array<string, string|null>
     *
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        's2sSnapchatToken' => null,
        's2sSnapchatPixelId' => null,
        's2sSnapchatLandingPageEvent' => null,
        's2sSnapchatSearchEvent' => null,
        's2sSnapchatClickEvent' => null,
        'type' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization.
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        's2sSnapchatToken' => false,
        's2sSnapchatPixelId' => false,
        's2sSnapchatLandingPageEvent' => false,
        's2sSnapchatSearchEvent' => false,
        's2sSnapchatClickEvent' => false,
        'type' => false,
    ];

    /**
     * If a nullable field gets set to null, insert it here.
     *
     * @var bool[]
     */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties.
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null.
     *
     * @return bool[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null.
     *
     * @param bool[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable.
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        's2sSnapchatToken' => 's2sSnapchatToken',
        's2sSnapchatPixelId' => 's2sSnapchatPixelId',
        's2sSnapchatLandingPageEvent' => 's2sSnapchatLandingPageEvent',
        's2sSnapchatSearchEvent' => 's2sSnapchatSearchEvent',
        's2sSnapchatClickEvent' => 's2sSnapchatClickEvent',
        'type' => 'type',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        's2sSnapchatToken' => 'setS2sSnapchatToken',
        's2sSnapchatPixelId' => 'setS2sSnapchatPixelId',
        's2sSnapchatLandingPageEvent' => 'setS2sSnapchatLandingPageEvent',
        's2sSnapchatSearchEvent' => 'setS2sSnapchatSearchEvent',
        's2sSnapchatClickEvent' => 'setS2sSnapchatClickEvent',
        'type' => 'setType',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        's2sSnapchatToken' => 'getS2sSnapchatToken',
        's2sSnapchatPixelId' => 'getS2sSnapchatPixelId',
        's2sSnapchatLandingPageEvent' => 'getS2sSnapchatLandingPageEvent',
        's2sSnapchatSearchEvent' => 'getS2sSnapchatSearchEvent',
        's2sSnapchatClickEvent' => 'getS2sSnapchatClickEvent',
        'type' => 'getType',
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
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
        return self::$openAPIModelName;
    }

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[]|null $data Associated array of property values
     *                           initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('s2sSnapchatToken', $data ?? [], null);
        $this->setIfExists('s2sSnapchatPixelId', $data ?? [], null);
        $this->setIfExists('s2sSnapchatLandingPageEvent', $data ?? [], null);
        $this->setIfExists('s2sSnapchatSearchEvent', $data ?? [], null);
        $this->setIfExists('s2sSnapchatClickEvent', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
    }

    /**
     * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
     * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
     * $this->openAPINullablesSetToNull array.
     */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (null === $this->container['s2sSnapchatToken']) {
            $invalidProperties[] = "'s2sSnapchatToken' can't be null";
        }
        if (null === $this->container['s2sSnapchatPixelId']) {
            $invalidProperties[] = "'s2sSnapchatPixelId' can't be null";
        }
        if (null === $this->container['type']) {
            $invalidProperties[] = "'type' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets s2sSnapchatToken.
     *
     * @return string
     */
    public function getS2sSnapchatToken()
    {
        return $this->container['s2sSnapchatToken'];
    }

    /**
     * Sets s2sSnapchatToken.
     *
     * @param string $s2sSnapchatToken conversion API token
     *
     * @return self
     */
    public function setS2sSnapchatToken($s2sSnapchatToken)
    {
        if (is_null($s2sSnapchatToken)) {
            throw new \InvalidArgumentException('non-nullable s2sSnapchatToken cannot be null');
        }
        $this->container['s2sSnapchatToken'] = $s2sSnapchatToken;

        return $this;
    }

    /**
     * Gets s2sSnapchatPixelId.
     *
     * @return string
     */
    public function getS2sSnapchatPixelId()
    {
        return $this->container['s2sSnapchatPixelId'];
    }

    /**
     * Sets s2sSnapchatPixelId.
     *
     * @param string $s2sSnapchatPixelId Event Pixel ID from Snapchat Ads Manager.  More details on how to set up the tracking can be found in the [Snapchat Ads Manager](https://forbusiness.snapchat.com/blog/the-snap-pixel-how-it-works-and-how-to-install-it#installation)
     *
     * @return self
     */
    public function setS2sSnapchatPixelId($s2sSnapchatPixelId)
    {
        if (is_null($s2sSnapchatPixelId)) {
            throw new \InvalidArgumentException('non-nullable s2sSnapchatPixelId cannot be null');
        }
        $this->container['s2sSnapchatPixelId'] = $s2sSnapchatPixelId;

        return $this;
    }

    /**
     * Gets s2sSnapchatLandingPageEvent.
     *
     * @return S2sSnapchatEventType|null
     */
    public function getS2sSnapchatLandingPageEvent()
    {
        return $this->container['s2sSnapchatLandingPageEvent'];
    }

    /**
     * Sets s2sSnapchatLandingPageEvent.
     *
     * @param S2sSnapchatEventType|null $s2sSnapchatLandingPageEvent event name for the Landing Visit event
     *
     * @return self
     */
    public function setS2sSnapchatLandingPageEvent($s2sSnapchatLandingPageEvent)
    {
        if (is_null($s2sSnapchatLandingPageEvent)) {
            throw new \InvalidArgumentException('non-nullable s2sSnapchatLandingPageEvent cannot be null');
        }
        $this->container['s2sSnapchatLandingPageEvent'] = $s2sSnapchatLandingPageEvent;

        return $this;
    }

    /**
     * Gets s2sSnapchatSearchEvent.
     *
     * @return S2sSnapchatEventType|null
     */
    public function getS2sSnapchatSearchEvent()
    {
        return $this->container['s2sSnapchatSearchEvent'];
    }

    /**
     * Sets s2sSnapchatSearchEvent.
     *
     * @param S2sSnapchatEventType|null $s2sSnapchatSearchEvent Event name for the Search event. Can be used for tracking \"1st\" click
     *
     * @return self
     */
    public function setS2sSnapchatSearchEvent($s2sSnapchatSearchEvent)
    {
        if (is_null($s2sSnapchatSearchEvent)) {
            throw new \InvalidArgumentException('non-nullable s2sSnapchatSearchEvent cannot be null');
        }
        $this->container['s2sSnapchatSearchEvent'] = $s2sSnapchatSearchEvent;

        return $this;
    }

    /**
     * Gets s2sSnapchatClickEvent.
     *
     * @return S2sSnapchatEventType|null
     */
    public function getS2sSnapchatClickEvent()
    {
        return $this->container['s2sSnapchatClickEvent'];
    }

    /**
     * Sets s2sSnapchatClickEvent.
     *
     * @param S2sSnapchatEventType|null $s2sSnapchatClickEvent Event name for the Ad Click or \"2nd\" click event. Commonly used for conversion tracking
     *
     * @return self
     */
    public function setS2sSnapchatClickEvent($s2sSnapchatClickEvent)
    {
        if (is_null($s2sSnapchatClickEvent)) {
            throw new \InvalidArgumentException('non-nullable s2sSnapchatClickEvent cannot be null');
        }
        $this->container['s2sSnapchatClickEvent'] = $s2sSnapchatClickEvent;

        return $this;
    }

    /**
     * Gets type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type.
     *
     * @param string $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value): void
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
     * @param int $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @see https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed returns data which can be serialized by json_encode(), which is a value
     *               of any type other than a resource
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object.
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
