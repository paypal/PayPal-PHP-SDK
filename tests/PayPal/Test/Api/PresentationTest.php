<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Presentation;

/**
 * Class Presentation
 *
 * @package PayPal\Test\Api
 */
class PresentationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Presentation
     * @return string
     */
    public static function getJson()
    {
        return json_encode(json_decode('{"brand_name":"TestSample","logo_image":"TestSample","locale_code":"TestSample"}'));
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Presentation
     */
    public static function getObject()
    {
        return new Presentation(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Presentation
     */
    public function testSerializationDeserialization()
    {
        $obj = new Presentation(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBrandName());
        $this->assertNotNull($obj->getLogoImage());
        $this->assertNotNull($obj->getLocaleCode());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Presentation $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getBrandName(), "TestSample");
        $this->assertEquals($obj->getLogoImage(), "TestSample");
        $this->assertEquals($obj->getLocaleCode(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Presentation $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getBrand_name(), "TestSample");
        $this->assertEquals($obj->getLogo_image(), "TestSample");
        $this->assertEquals($obj->getLocale_code(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Presentation $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Brand_name
        $obj->setBrandName(null);
        $this->assertNull($obj->getBrand_name());
        $this->assertNull($obj->getBrandName());
        $this->assertSame($obj->getBrandName(), $obj->getBrand_name());
        $obj->setBrand_name("TestSample");
        $this->assertEquals($obj->getBrand_name(), "TestSample");

        // Check for Logo_image
        $obj->setLogoImage(null);
        $this->assertNull($obj->getLogo_image());
        $this->assertNull($obj->getLogoImage());
        $this->assertSame($obj->getLogoImage(), $obj->getLogo_image());
        $obj->setLogo_image("TestSample");
        $this->assertEquals($obj->getLogo_image(), "TestSample");

        // Check for Locale_code
        $obj->setLocaleCode(null);
        $this->assertNull($obj->getLocale_code());
        $this->assertNull($obj->getLocaleCode());
        $this->assertSame($obj->getLocaleCode(), $obj->getLocale_code());
        $obj->setLocale_code("TestSample");
        $this->assertEquals($obj->getLocale_code(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
