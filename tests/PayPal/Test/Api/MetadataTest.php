<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Metadata;

/**
 * Class Metadata
 *
 * @package PayPal\Test\Api
 */
class MetadataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Metadata
     * @return string
     */
    public static function getJson()
    {
        return '{"created_date":"TestSample","created_by":"TestSample","cancelled_date":"TestSample","cancelled_by":"TestSample","last_updated_date":"TestSample","last_updated_by":"TestSample","first_sent_date":"TestSample","last_sent_date":"TestSample","last_sent_by":"TestSample","payer_view_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Metadata
     */
    public static function getObject()
    {
        return new Metadata(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Metadata
     */
    public function testSerializationDeserialization()
    {
        $obj = new Metadata(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCreatedDate());
        $this->assertNotNull($obj->getCreatedBy());
        $this->assertNotNull($obj->getCancelledDate());
        $this->assertNotNull($obj->getCancelledBy());
        $this->assertNotNull($obj->getLastUpdatedDate());
        $this->assertNotNull($obj->getLastUpdatedBy());
        $this->assertNotNull($obj->getFirstSentDate());
        $this->assertNotNull($obj->getLastSentDate());
        $this->assertNotNull($obj->getLastSentBy());
        $this->assertNotNull($obj->getPayerViewUrl());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Metadata $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getCreatedDate(), "TestSample");
        $this->assertEquals($obj->getCreatedBy(), "TestSample");
        $this->assertEquals($obj->getCancelledDate(), "TestSample");
        $this->assertEquals($obj->getCancelledBy(), "TestSample");
        $this->assertEquals($obj->getLastUpdatedDate(), "TestSample");
        $this->assertEquals($obj->getLastUpdatedBy(), "TestSample");
        $this->assertEquals($obj->getFirstSentDate(), "TestSample");
        $this->assertEquals($obj->getLastSentDate(), "TestSample");
        $this->assertEquals($obj->getLastSentBy(), "TestSample");
        $this->assertEquals($obj->getPayerViewUrl(), "http://www.google.com");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Metadata $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getCreated_date(), "TestSample");
        $this->assertEquals($obj->getCreated_by(), "TestSample");
        $this->assertEquals($obj->getCancelled_date(), "TestSample");
        $this->assertEquals($obj->getCancelled_by(), "TestSample");
        $this->assertEquals($obj->getLast_updated_date(), "TestSample");
        $this->assertEquals($obj->getLast_updated_by(), "TestSample");
        $this->assertEquals($obj->getFirst_sent_date(), "TestSample");
        $this->assertEquals($obj->getLast_sent_date(), "TestSample");
        $this->assertEquals($obj->getLast_sent_by(), "TestSample");
        $this->assertEquals($obj->getPayer_view_url(), "http://www.google.com");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Metadata $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Created_date
        $obj->setCreatedDate(null);
        $this->assertNull($obj->getCreated_date());
        $this->assertNull($obj->getCreatedDate());
        $this->assertSame($obj->getCreatedDate(), $obj->getCreated_date());
        $obj->setCreated_date("TestSample");
        $this->assertEquals($obj->getCreated_date(), "TestSample");

        // Check for Created_by
        $obj->setCreatedBy(null);
        $this->assertNull($obj->getCreated_by());
        $this->assertNull($obj->getCreatedBy());
        $this->assertSame($obj->getCreatedBy(), $obj->getCreated_by());
        $obj->setCreated_by("TestSample");
        $this->assertEquals($obj->getCreated_by(), "TestSample");

        // Check for Cancelled_date
        $obj->setCancelledDate(null);
        $this->assertNull($obj->getCancelled_date());
        $this->assertNull($obj->getCancelledDate());
        $this->assertSame($obj->getCancelledDate(), $obj->getCancelled_date());
        $obj->setCancelled_date("TestSample");
        $this->assertEquals($obj->getCancelled_date(), "TestSample");

        // Check for Cancelled_by
        $obj->setCancelledBy(null);
        $this->assertNull($obj->getCancelled_by());
        $this->assertNull($obj->getCancelledBy());
        $this->assertSame($obj->getCancelledBy(), $obj->getCancelled_by());
        $obj->setCancelled_by("TestSample");
        $this->assertEquals($obj->getCancelled_by(), "TestSample");

        // Check for Last_updated_date
        $obj->setLastUpdatedDate(null);
        $this->assertNull($obj->getLast_updated_date());
        $this->assertNull($obj->getLastUpdatedDate());
        $this->assertSame($obj->getLastUpdatedDate(), $obj->getLast_updated_date());
        $obj->setLast_updated_date("TestSample");
        $this->assertEquals($obj->getLast_updated_date(), "TestSample");

        // Check for Last_updated_by
        $obj->setLastUpdatedBy(null);
        $this->assertNull($obj->getLast_updated_by());
        $this->assertNull($obj->getLastUpdatedBy());
        $this->assertSame($obj->getLastUpdatedBy(), $obj->getLast_updated_by());
        $obj->setLast_updated_by("TestSample");
        $this->assertEquals($obj->getLast_updated_by(), "TestSample");

        // Check for First_sent_date
        $obj->setFirstSentDate(null);
        $this->assertNull($obj->getFirst_sent_date());
        $this->assertNull($obj->getFirstSentDate());
        $this->assertSame($obj->getFirstSentDate(), $obj->getFirst_sent_date());
        $obj->setFirst_sent_date("TestSample");
        $this->assertEquals($obj->getFirst_sent_date(), "TestSample");

        // Check for Last_sent_date
        $obj->setLastSentDate(null);
        $this->assertNull($obj->getLast_sent_date());
        $this->assertNull($obj->getLastSentDate());
        $this->assertSame($obj->getLastSentDate(), $obj->getLast_sent_date());
        $obj->setLast_sent_date("TestSample");
        $this->assertEquals($obj->getLast_sent_date(), "TestSample");

        // Check for Last_sent_by
        $obj->setLastSentBy(null);
        $this->assertNull($obj->getLast_sent_by());
        $this->assertNull($obj->getLastSentBy());
        $this->assertSame($obj->getLastSentBy(), $obj->getLast_sent_by());
        $obj->setLast_sent_by("TestSample");
        $this->assertEquals($obj->getLast_sent_by(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PayerViewUrl is not a fully qualified URL
     */
    public function testUrlValidationForPayerViewUrl()
    {
        $obj = new Metadata();
        $obj->setPayerViewUrl(null);
    }

    public function testUrlValidationForPayerViewUrlDeprecated()
    {
        $obj = new Metadata();
        $obj->setPayer_view_url(null);
        $this->assertNull($obj->getPayer_view_url());
    }

}
