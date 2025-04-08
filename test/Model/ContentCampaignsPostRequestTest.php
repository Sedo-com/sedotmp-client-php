<?php

/**
 * ContentCampaignsPostRequestTest.
 *
 * PHP version 8.1
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */

namespace Sedo\Test\Model;

use PHPUnit\Framework\TestCase;
use Sedo\SedoTMP\OpenApi\ObjectSerializer;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequest;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestArticle;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestCampaign;
use Sedo\SedoTMP\OpenApi\Platform\Model\ContentCampaignsPostRequestPartner;

/**
 * ContentCampaignsPostRequestTest Class Doc Comment.
 *
 * @category    Class
 *
 * @description ContentCampaignsPostRequest
 *
 * @author      OpenAPI Generator team
 *
 * @see        https://openapi-generator.tech
 */
class ContentCampaignsPostRequestTest extends TestCase
{
    private ContentCampaignsPostRequest $contentCampaignsPostRequest;

    /**
     * Setup before running any test case.
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case.
     */
    public function setUp(): void
    {
        $this->contentCampaignsPostRequest = new ContentCampaignsPostRequest();
    }

    /**
     * Clean up after running each test case.
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases.
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test "ContentCampaignsPostRequest".
     */
    public function testContentCampaignsPostRequest()
    {
        // Test that the model can be instantiated
        $this->assertInstanceOf(ContentCampaignsPostRequest::class, $this->contentCampaignsPostRequest);

        // Test serialization and deserialization
        $article = new ContentCampaignsPostRequestArticle();
        $article->setTitle('Test Article');
        $article->setExcerpt('This is a test article content');

        $campaign = new ContentCampaignsPostRequestCampaign();
        $campaign->setName('Test Campaign');
        $campaign->setType('Test');

        $this->contentCampaignsPostRequest->setPublishDomainName('example.com');
        $this->contentCampaignsPostRequest->setArticle($article);
        $this->contentCampaignsPostRequest->setCampaign($campaign);

        // Serialize the object to JSON
        $serialized = ObjectSerializer::sanitizeForSerialization($this->contentCampaignsPostRequest);
        $json = json_encode($serialized);

        // Test that the JSON is valid
        $this->assertIsString($json);
        $this->assertNotFalse(json_decode($json));

        // Test that the JSON contains the expected values
        $data = json_decode($json, true);
        $this->assertEquals('example.com', $data['publishDomainName']);
        $this->assertEquals('Test Article', $data['article']['title']);
        $this->assertEquals('This is a test article content', $data['article']['content']);
        $this->assertEquals('Test Campaign', $data['campaign']['name']);
        $this->assertEquals(100, $data['campaign']['budget']);
    }

    /**
     * Test attribute "publishDomainName".
     */
    public function testPropertyPublishDomainName()
    {
        // Test setting and getting the publishDomainName property
        $publishDomainName = 'example.com';
        $this->contentCampaignsPostRequest->setPublishDomainName($publishDomainName);
        $this->assertEquals($publishDomainName, $this->contentCampaignsPostRequest->getPublishDomainName());

        // Test that an exception is thrown when setting a null value
        $this->expectException(\InvalidArgumentException::class);
        $this->contentCampaignsPostRequest->setPublishDomainName(null);
    }

    /**
     * Test attribute "article".
     */
    public function testPropertyArticle()
    {
        // Test setting and getting the article property
        $article = new ContentCampaignsPostRequestArticle();
        $article->setTitle('Test Article');
        $article->setExcerpt('This is a test article content');

        $this->contentCampaignsPostRequest->setArticle($article);
        $this->assertSame($article, $this->contentCampaignsPostRequest->getArticle());

        // Test that the article object has the expected values
        $this->assertEquals('Test Article', $this->contentCampaignsPostRequest->getArticle()->getTitle());
        $this->assertEquals('This is a test article content', $this->contentCampaignsPostRequest->getArticle()->getExcerpt());

        // Test that an exception is thrown when setting a null value
        $this->expectException(\InvalidArgumentException::class);
        $this->contentCampaignsPostRequest->setArticle(null);
    }

    /**
     * Test attribute "campaign".
     */
    public function testPropertyCampaign()
    {
        // Test setting and getting the campaign property
        $campaign = new ContentCampaignsPostRequestCampaign();
        $campaign->setName('Test Campaign');
        $campaign->setType('Test');

        $this->contentCampaignsPostRequest->setCampaign($campaign);
        $this->assertSame($campaign, $this->contentCampaignsPostRequest->getCampaign());

        // Test that the campaign object has the expected values
        $this->assertEquals('Test Campaign', $this->contentCampaignsPostRequest->getCampaign()->getName());
        $this->assertEquals('Test', $this->contentCampaignsPostRequest->getCampaign()->getType());

        // Test that an exception is thrown when setting a null value
        $this->expectException(\InvalidArgumentException::class);
        $this->contentCampaignsPostRequest->setCampaign(null);
    }

    /**
     * Test attribute "partner".
     */
    public function testPropertyPartner()
    {
        // Test setting and getting the partner property
        $partner = new ContentCampaignsPostRequestPartner();
        $partner->setId('partner-123');
        $partner->setName('Test Partner');

        $this->contentCampaignsPostRequest->setPartner($partner);
        $this->assertSame($partner, $this->contentCampaignsPostRequest->getPartner());

        // Test that the partner object has the expected values
        $this->assertEquals('partner-123', $this->contentCampaignsPostRequest->getPartner()->getId());
        $this->assertEquals('Test Partner', $this->contentCampaignsPostRequest->getPartner()->getName());

        // Test that setting null is allowed for this property (it's optional)
        $this->contentCampaignsPostRequest->setPartner(null);
        $this->assertNull($this->contentCampaignsPostRequest->getPartner());
    }
}
