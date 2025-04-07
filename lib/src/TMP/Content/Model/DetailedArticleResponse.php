<?php
/**
 * DetailedArticleResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * content-api
 *
 * # Introduction and Process Overview  This API offers easy-to-use endpoints for managing articles on content sites using the Sedo Traffic Monetization Platform.  # Authentication The API uses a modern OAuth authentication process to ensure security without sacrificing simplicity. To access the API, you need an access token. For more details on authentication, please refer to the [Introduction](/cms/docs-api/introduction) section.  <!-- ReDoc-Inject: <security-definitions> -->
 *
 * OpenAPI spec version: 1.2.0
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
 * DetailedArticleResponse Class Doc Comment
 *
 * @category Class
 * @package  Sedo
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DetailedArticleResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DetailedArticleResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => '\Sedo\SedoTMP\Content\Model\Id',
        'title' => '\Sedo\SedoTMP\Content\Model\ArticleTitle',
        'excerpt' => '\Sedo\SedoTMP\Content\Model\ArticleExcerpt',
        'text' => '\Sedo\SedoTMP\Content\Model\ArticleText',
        'categoryId' => '\Sedo\SedoTMP\Content\Model\Id',
        'tags' => '\Sedo\SedoTMP\Content\Model\ArticleTags',
        'country' => '\Sedo\SedoTMP\Content\Model\Country',
        'locale' => '\Sedo\SedoTMP\Content\Model\Locale',
        'images' => '\Sedo\SedoTMP\Content\Model\ArticleImagesList',
        'createdDate' => '\Sedo\SedoTMP\Content\Model\\DateTime',
        'lastModifiedDate' => '\Sedo\SedoTMP\Content\Model\\DateTime',
        'partner' => '\Sedo\SedoTMP\Content\Model\Partner',
        'createdBy' => '\Sedo\SedoTMP\Content\Model\User',
        'lastModifiedBy' => '\Sedo\SedoTMP\Content\Model\User',
        'publishedArticles' => '\Sedo\SedoTMP\Content\Model\MinimalPublishedArticle[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'title' => null,
        'excerpt' => null,
        'text' => null,
        'categoryId' => null,
        'tags' => null,
        'country' => null,
        'locale' => null,
        'images' => null,
        'createdDate' => null,
        'lastModifiedDate' => null,
        'partner' => null,
        'createdBy' => null,
        'lastModifiedBy' => null,
        'publishedArticles' => null
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
        'id' => 'id',
        'title' => 'title',
        'excerpt' => 'excerpt',
        'text' => 'text',
        'categoryId' => 'categoryId',
        'tags' => 'tags',
        'country' => 'country',
        'locale' => 'locale',
        'images' => 'images',
        'createdDate' => 'createdDate',
        'lastModifiedDate' => 'lastModifiedDate',
        'partner' => 'partner',
        'createdBy' => 'createdBy',
        'lastModifiedBy' => 'lastModifiedBy',
        'publishedArticles' => 'publishedArticles'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'title' => 'setTitle',
        'excerpt' => 'setExcerpt',
        'text' => 'setText',
        'categoryId' => 'setCategoryId',
        'tags' => 'setTags',
        'country' => 'setCountry',
        'locale' => 'setLocale',
        'images' => 'setImages',
        'createdDate' => 'setCreatedDate',
        'lastModifiedDate' => 'setLastModifiedDate',
        'partner' => 'setPartner',
        'createdBy' => 'setCreatedBy',
        'lastModifiedBy' => 'setLastModifiedBy',
        'publishedArticles' => 'setPublishedArticles'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'title' => 'getTitle',
        'excerpt' => 'getExcerpt',
        'text' => 'getText',
        'categoryId' => 'getCategoryId',
        'tags' => 'getTags',
        'country' => 'getCountry',
        'locale' => 'getLocale',
        'images' => 'getImages',
        'createdDate' => 'getCreatedDate',
        'lastModifiedDate' => 'getLastModifiedDate',
        'partner' => 'getPartner',
        'createdBy' => 'getCreatedBy',
        'lastModifiedBy' => 'getLastModifiedBy',
        'publishedArticles' => 'getPublishedArticles'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['excerpt'] = isset($data['excerpt']) ? $data['excerpt'] : null;
        $this->container['text'] = isset($data['text']) ? $data['text'] : null;
        $this->container['categoryId'] = isset($data['categoryId']) ? $data['categoryId'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['locale'] = isset($data['locale']) ? $data['locale'] : null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['createdDate'] = isset($data['createdDate']) ? $data['createdDate'] : null;
        $this->container['lastModifiedDate'] = isset($data['lastModifiedDate']) ? $data['lastModifiedDate'] : null;
        $this->container['partner'] = isset($data['partner']) ? $data['partner'] : null;
        $this->container['createdBy'] = isset($data['createdBy']) ? $data['createdBy'] : null;
        $this->container['lastModifiedBy'] = isset($data['lastModifiedBy']) ? $data['lastModifiedBy'] : null;
        $this->container['publishedArticles'] = isset($data['publishedArticles']) ? $data['publishedArticles'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets id
     *
     * @return \Sedo\SedoTMP\Content\Model\Id
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param \Sedo\SedoTMP\Content\Model\Id $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets title
     *
     * @return \Sedo\SedoTMP\Content\Model\ArticleTitle
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param \Sedo\SedoTMP\Content\Model\ArticleTitle $title title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets excerpt
     *
     * @return \Sedo\SedoTMP\Content\Model\ArticleExcerpt
     */
    public function getExcerpt()
    {
        return $this->container['excerpt'];
    }

    /**
     * Sets excerpt
     *
     * @param \Sedo\SedoTMP\Content\Model\ArticleExcerpt $excerpt excerpt
     *
     * @return $this
     */
    public function setExcerpt($excerpt)
    {
        $this->container['excerpt'] = $excerpt;

        return $this;
    }

    /**
     * Gets text
     *
     * @return \Sedo\SedoTMP\Content\Model\ArticleText
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param \Sedo\SedoTMP\Content\Model\ArticleText $text text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets categoryId
     *
     * @return \Sedo\SedoTMP\Content\Model\Id
     */
    public function getCategoryId()
    {
        return $this->container['categoryId'];
    }

    /**
     * Sets categoryId
     *
     * @param \Sedo\SedoTMP\Content\Model\Id $categoryId categoryId
     *
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->container['categoryId'] = $categoryId;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Sedo\SedoTMP\Content\Model\ArticleTags
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Sedo\SedoTMP\Content\Model\ArticleTags $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets country
     *
     * @return \Sedo\SedoTMP\Content\Model\Country
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param \Sedo\SedoTMP\Content\Model\Country $country country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets locale
     *
     * @return \Sedo\SedoTMP\Content\Model\Locale
     */
    public function getLocale()
    {
        return $this->container['locale'];
    }

    /**
     * Sets locale
     *
     * @param \Sedo\SedoTMP\Content\Model\Locale $locale locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->container['locale'] = $locale;

        return $this;
    }

    /**
     * Gets images
     *
     * @return \Sedo\SedoTMP\Content\Model\ArticleImagesList
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images
     *
     * @param \Sedo\SedoTMP\Content\Model\ArticleImagesList $images images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->container['images'] = $images;

        return $this;
    }

    /**
     * Gets createdDate
     *
     * @return \Sedo\SedoTMP\Content\Model\\DateTime
     */
    public function getCreatedDate()
    {
        return $this->container['createdDate'];
    }

    /**
     * Sets createdDate
     *
     * @param \Sedo\SedoTMP\Content\Model\\DateTime $createdDate createdDate
     *
     * @return $this
     */
    public function setCreatedDate($createdDate)
    {
        $this->container['createdDate'] = $createdDate;

        return $this;
    }

    /**
     * Gets lastModifiedDate
     *
     * @return \Sedo\SedoTMP\Content\Model\\DateTime
     */
    public function getLastModifiedDate()
    {
        return $this->container['lastModifiedDate'];
    }

    /**
     * Sets lastModifiedDate
     *
     * @param \Sedo\SedoTMP\Content\Model\\DateTime $lastModifiedDate lastModifiedDate
     *
     * @return $this
     */
    public function setLastModifiedDate($lastModifiedDate)
    {
        $this->container['lastModifiedDate'] = $lastModifiedDate;

        return $this;
    }

    /**
     * Gets partner
     *
     * @return \Sedo\SedoTMP\Content\Model\Partner
     */
    public function getPartner()
    {
        return $this->container['partner'];
    }

    /**
     * Sets partner
     *
     * @param \Sedo\SedoTMP\Content\Model\Partner $partner partner
     *
     * @return $this
     */
    public function setPartner($partner)
    {
        $this->container['partner'] = $partner;

        return $this;
    }

    /**
     * Gets createdBy
     *
     * @return \Sedo\SedoTMP\Content\Model\User
     */
    public function getCreatedBy()
    {
        return $this->container['createdBy'];
    }

    /**
     * Sets createdBy
     *
     * @param \Sedo\SedoTMP\Content\Model\User $createdBy createdBy
     *
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->container['createdBy'] = $createdBy;

        return $this;
    }

    /**
     * Gets lastModifiedBy
     *
     * @return \Sedo\SedoTMP\Content\Model\User
     */
    public function getLastModifiedBy()
    {
        return $this->container['lastModifiedBy'];
    }

    /**
     * Sets lastModifiedBy
     *
     * @param \Sedo\SedoTMP\Content\Model\User $lastModifiedBy lastModifiedBy
     *
     * @return $this
     */
    public function setLastModifiedBy($lastModifiedBy)
    {
        $this->container['lastModifiedBy'] = $lastModifiedBy;

        return $this;
    }

    /**
     * Gets publishedArticles
     *
     * @return \Sedo\SedoTMP\Content\Model\MinimalPublishedArticle[]
     */
    public function getPublishedArticles()
    {
        return $this->container['publishedArticles'];
    }

    /**
     * Sets publishedArticles
     *
     * @param \Sedo\SedoTMP\Content\Model\MinimalPublishedArticle[] $publishedArticles publishedArticles
     *
     * @return $this
     */
    public function setPublishedArticles($publishedArticles)
    {
        $this->container['publishedArticles'] = $publishedArticles;

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
