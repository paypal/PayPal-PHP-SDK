<?php

namespace PayPal\Test\Api;

use PayPal\Api\WebProfile;

/**
 * Class WebProfile
 *
 * @package PayPal\Test\Api
 */
class WebProfileTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateprofileSerialization()
    {
        $requestBody = '{"name":"someName2' . uniqid() . '","presentation":{"logo_image":"http://www.ebay.com"},"input_fields":{"no_shipping":1,"address_override":1},"flow_config":{"landing_page_type":"billing","bank_txn_pending_url":"http://www.ebay.com"}}';
        $requestBodyEncoded = json_encode(json_decode($requestBody, true));
        $object = new WebProfile($requestBodyEncoded);

        $json = $object->toJson();
        $this->assertEquals($requestBodyEncoded, $json);
    }


    /**
     * @group integration
     */
    public function testCreateprofileOperation()
    {
        $requestBody = '{"name":"someName2' . uniqid() . '","presentation":{"logo_image":"http://www.ebay.com"},"input_fields":{"no_shipping":1,"address_override":1},"flow_config":{"landing_page_type":"billing","bank_txn_pending_url":"http://www.ebay.com"}}';
        $requestBodyEncoded = json_encode(json_decode($requestBody, true));
        $object = new WebProfile($requestBodyEncoded);
        $response = $object->create(null);
        $this->assertNotNull($response);
        return $response->getId();
    }


    /**
     * @depends testCreateprofileOperation
     * @group   integration
     */
    public function testGetprofileOperation($profileId)
    {
        $response = WebProfile::get($profileId, null);
        $this->assertNotNull($response);
        $this->assertEquals($response->getId(), $profileId);
        $this->assertEquals("http://www.ebay.com", $response->getPresentation()->getLogoImage());
        $this->assertEquals(1, $response->getInputFields()->getNoShipping());
        $this->assertEquals(1, $response->getInputFields()->getAddressOverride());
        $this->assertEquals("billing", $response->getFlowConfig()->getLandingPageType());
        $this->assertEquals("http://www.ebay.com", $response->getFlowConfig()->getBankTxnPendingUrl());
        return $response->getId();
    }


    public function testValidationerrorSerialization()
    {
        $requestBody = '{"name":"sampleName' . uniqid() . '","presentation":{"logo_image":"http://www.ebay.com"},"input_fields":{"no_shipping":4,"address_override":1},"flow_config":{"landing_page_type":"billing","bank_txn_pending_url":"ht//www.ebay.com"}}';
        $requestBodyEncoded = json_encode(json_decode($requestBody, true));
        $object = new WebProfile($requestBodyEncoded);

        $json = $object->toJson();
        $this->assertEquals($requestBodyEncoded, $json);
    }


    /**
     * @group                 integration
     * @expectedException PayPal\Exception\PPConnectionException
     * @expectedExceptionCode 400
     */
    public function testValidationerrorOperation()
    {
        $requestBody = '{"name":"sampleName' . uniqid() . '","presentation":{"logo_image":"http://www.ebay.com"},"input_fields":{"no_shipping":4,"address_override":1},"flow_config":{"landing_page_type":"billing","bank_txn_pending_url":"ht//www.ebay.com"}}';
        $requestBodyEncoded = json_encode(json_decode($requestBody, true));
        $object = new WebProfile($requestBodyEncoded);
        $response = $object->create(null);
        return $response->getId();
    }

}
