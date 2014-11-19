<?php

namespace PayPal\Test\Api;

use PayPal\Common\PPModel;
use PayPal\Api\Search;

/**
 * Class Search
 *
 * @package PayPal\Test\Api
 */
class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Search
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","recipient_first_name":"TestSample","recipient_last_name":"TestSample","recipient_business_name":"TestSample","number":"TestSample","status":"TestSample","lower_total_amount":' .CurrencyTest::getJson() . ',"upper_total_amount":' .CurrencyTest::getJson() . ',"start_invoice_date":"TestSample","end_invoice_date":"TestSample","start_due_date":"TestSample","end_due_date":"TestSample","start_payment_date":"TestSample","end_payment_date":"TestSample","start_creation_date":"TestSample","end_creation_date":"TestSample","page":"12.34","page_size":"12.34","total_count_required":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Search
     */
    public static function getObject()
    {
        return new Search(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Search
     */
    public function testSerializationDeserialization()
    {
        $obj = new Search(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getRecipientFirstName());
        $this->assertNotNull($obj->getRecipientLastName());
        $this->assertNotNull($obj->getRecipientBusinessName());
        $this->assertNotNull($obj->getNumber());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getLowerTotalAmount());
        $this->assertNotNull($obj->getUpperTotalAmount());
        $this->assertNotNull($obj->getStartInvoiceDate());
        $this->assertNotNull($obj->getEndInvoiceDate());
        $this->assertNotNull($obj->getStartDueDate());
        $this->assertNotNull($obj->getEndDueDate());
        $this->assertNotNull($obj->getStartPaymentDate());
        $this->assertNotNull($obj->getEndPaymentDate());
        $this->assertNotNull($obj->getStartCreationDate());
        $this->assertNotNull($obj->getEndCreationDate());
        $this->assertNotNull($obj->getPage());
        $this->assertNotNull($obj->getPageSize());
        $this->assertNotNull($obj->getTotalCountRequired());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Search $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getRecipientFirstName(), "TestSample");
        $this->assertEquals($obj->getRecipientLastName(), "TestSample");
        $this->assertEquals($obj->getRecipientBusinessName(), "TestSample");
        $this->assertEquals($obj->getNumber(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
        $this->assertEquals($obj->getLowerTotalAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getUpperTotalAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getStartInvoiceDate(), "TestSample");
        $this->assertEquals($obj->getEndInvoiceDate(), "TestSample");
        $this->assertEquals($obj->getStartDueDate(), "TestSample");
        $this->assertEquals($obj->getEndDueDate(), "TestSample");
        $this->assertEquals($obj->getStartPaymentDate(), "TestSample");
        $this->assertEquals($obj->getEndPaymentDate(), "TestSample");
        $this->assertEquals($obj->getStartCreationDate(), "TestSample");
        $this->assertEquals($obj->getEndCreationDate(), "TestSample");
        $this->assertEquals($obj->getPage(), "12.34");
        $this->assertEquals($obj->getPageSize(), "12.34");
        $this->assertEquals($obj->getTotalCountRequired(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param Search $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getRecipient_first_name(), "TestSample");
        $this->assertEquals($obj->getRecipient_last_name(), "TestSample");
        $this->assertEquals($obj->getRecipient_business_name(), "TestSample");
        $this->assertEquals($obj->getLower_total_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getUpper_total_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getStart_invoice_date(), "TestSample");
        $this->assertEquals($obj->getEnd_invoice_date(), "TestSample");
        $this->assertEquals($obj->getStart_due_date(), "TestSample");
        $this->assertEquals($obj->getEnd_due_date(), "TestSample");
        $this->assertEquals($obj->getStart_payment_date(), "TestSample");
        $this->assertEquals($obj->getEnd_payment_date(), "TestSample");
        $this->assertEquals($obj->getStart_creation_date(), "TestSample");
        $this->assertEquals($obj->getEnd_creation_date(), "TestSample");
        $this->assertEquals($obj->getPage_size(), "12.34");
        $this->assertEquals($obj->getTotal_count_required(), true);
    }

    /**
     * @depends testSerializationDeserialization
     * @param Search $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Recipient_first_name
        $obj->setRecipientFirstName(null);
        $this->assertNull($obj->getRecipient_first_name());
        $this->assertNull($obj->getRecipientFirstName());
        $this->assertSame($obj->getRecipientFirstName(), $obj->getRecipient_first_name());
        $obj->setRecipient_first_name("TestSample");
        $this->assertEquals($obj->getRecipient_first_name(), "TestSample");

        // Check for Recipient_last_name
        $obj->setRecipientLastName(null);
        $this->assertNull($obj->getRecipient_last_name());
        $this->assertNull($obj->getRecipientLastName());
        $this->assertSame($obj->getRecipientLastName(), $obj->getRecipient_last_name());
        $obj->setRecipient_last_name("TestSample");
        $this->assertEquals($obj->getRecipient_last_name(), "TestSample");

        // Check for Recipient_business_name
        $obj->setRecipientBusinessName(null);
        $this->assertNull($obj->getRecipient_business_name());
        $this->assertNull($obj->getRecipientBusinessName());
        $this->assertSame($obj->getRecipientBusinessName(), $obj->getRecipient_business_name());
        $obj->setRecipient_business_name("TestSample");
        $this->assertEquals($obj->getRecipient_business_name(), "TestSample");

        // Check for Lower_total_amount
        $obj->setLowerTotalAmount(null);
        $this->assertNull($obj->getLower_total_amount());
        $this->assertNull($obj->getLowerTotalAmount());
        $this->assertSame($obj->getLowerTotalAmount(), $obj->getLower_total_amount());
        $obj->setLower_total_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getLower_total_amount(), CurrencyTest::getObject());

        // Check for Upper_total_amount
        $obj->setUpperTotalAmount(null);
        $this->assertNull($obj->getUpper_total_amount());
        $this->assertNull($obj->getUpperTotalAmount());
        $this->assertSame($obj->getUpperTotalAmount(), $obj->getUpper_total_amount());
        $obj->setUpper_total_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getUpper_total_amount(), CurrencyTest::getObject());

        // Check for Start_invoice_date
        $obj->setStartInvoiceDate(null);
        $this->assertNull($obj->getStart_invoice_date());
        $this->assertNull($obj->getStartInvoiceDate());
        $this->assertSame($obj->getStartInvoiceDate(), $obj->getStart_invoice_date());
        $obj->setStart_invoice_date("TestSample");
        $this->assertEquals($obj->getStart_invoice_date(), "TestSample");

        // Check for End_invoice_date
        $obj->setEndInvoiceDate(null);
        $this->assertNull($obj->getEnd_invoice_date());
        $this->assertNull($obj->getEndInvoiceDate());
        $this->assertSame($obj->getEndInvoiceDate(), $obj->getEnd_invoice_date());
        $obj->setEnd_invoice_date("TestSample");
        $this->assertEquals($obj->getEnd_invoice_date(), "TestSample");

        // Check for Start_due_date
        $obj->setStartDueDate(null);
        $this->assertNull($obj->getStart_due_date());
        $this->assertNull($obj->getStartDueDate());
        $this->assertSame($obj->getStartDueDate(), $obj->getStart_due_date());
        $obj->setStart_due_date("TestSample");
        $this->assertEquals($obj->getStart_due_date(), "TestSample");

        // Check for End_due_date
        $obj->setEndDueDate(null);
        $this->assertNull($obj->getEnd_due_date());
        $this->assertNull($obj->getEndDueDate());
        $this->assertSame($obj->getEndDueDate(), $obj->getEnd_due_date());
        $obj->setEnd_due_date("TestSample");
        $this->assertEquals($obj->getEnd_due_date(), "TestSample");

        // Check for Start_payment_date
        $obj->setStartPaymentDate(null);
        $this->assertNull($obj->getStart_payment_date());
        $this->assertNull($obj->getStartPaymentDate());
        $this->assertSame($obj->getStartPaymentDate(), $obj->getStart_payment_date());
        $obj->setStart_payment_date("TestSample");
        $this->assertEquals($obj->getStart_payment_date(), "TestSample");

        // Check for End_payment_date
        $obj->setEndPaymentDate(null);
        $this->assertNull($obj->getEnd_payment_date());
        $this->assertNull($obj->getEndPaymentDate());
        $this->assertSame($obj->getEndPaymentDate(), $obj->getEnd_payment_date());
        $obj->setEnd_payment_date("TestSample");
        $this->assertEquals($obj->getEnd_payment_date(), "TestSample");

        // Check for Start_creation_date
        $obj->setStartCreationDate(null);
        $this->assertNull($obj->getStart_creation_date());
        $this->assertNull($obj->getStartCreationDate());
        $this->assertSame($obj->getStartCreationDate(), $obj->getStart_creation_date());
        $obj->setStart_creation_date("TestSample");
        $this->assertEquals($obj->getStart_creation_date(), "TestSample");

        // Check for End_creation_date
        $obj->setEndCreationDate(null);
        $this->assertNull($obj->getEnd_creation_date());
        $this->assertNull($obj->getEndCreationDate());
        $this->assertSame($obj->getEndCreationDate(), $obj->getEnd_creation_date());
        $obj->setEnd_creation_date("TestSample");
        $this->assertEquals($obj->getEnd_creation_date(), "TestSample");

        // Check for Page_size
        $obj->setPageSize(null);
        $this->assertNull($obj->getPage_size());
        $this->assertNull($obj->getPageSize());
        $this->assertSame($obj->getPageSize(), $obj->getPage_size());
        $obj->setPage_size("12.34");
        $this->assertEquals($obj->getPage_size(), "12.34");

        // Check for Total_count_required
        $obj->setTotalCountRequired(null);
        $this->assertNull($obj->getTotal_count_required());
        $this->assertNull($obj->getTotalCountRequired());
        $this->assertSame($obj->getTotalCountRequired(), $obj->getTotal_count_required());
        $obj->setTotal_count_required(true);
        $this->assertEquals($obj->getTotal_count_required(), true);

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }



}
