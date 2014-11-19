<?php

namespace PayPal\Test\Api;

use PayPal\Common\ResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\InvoiceSearchResponse;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PPRestCall;
use PayPal\Api\Invoice;

/**
 * Class Invoice
 *
 * @package PayPal\Test\Api
 */
class InvoiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Invoice
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","number":"TestSample","uri":"TestSample","status":"TestSample","merchant_info":' .MerchantInfoTest::getJson() . ',"billing_info":' .BillingInfoTest::getJson() . ',"shipping_info":' .ShippingInfoTest::getJson() . ',"items":' .InvoiceItemTest::getJson() . ',"invoice_date":"TestSample","payment_term":' .PaymentTermTest::getJson() . ',"discount":' .CostTest::getJson() . ',"shipping_cost":' .ShippingCostTest::getJson() . ',"custom":' .CustomAmountTest::getJson() . ',"tax_calculated_after_discount":true,"tax_inclusive":true,"terms":"TestSample","note":"TestSample","merchant_memo":"TestSample","logo_url":"http://www.google.com","total_amount":' .CurrencyTest::getJson() . ',"payment_details":' .PaymentDetailTest::getJson() . ',"refund_details":' .RefundDetailTest::getJson() . ',"metadata":' .MetadataTest::getJson() . ',"additional_data":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Invoice
     */
    public static function getObject()
    {
        return new Invoice(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Invoice
     */
    public function testSerializationDeserialization()
    {
        $obj = new Invoice(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getNumber());
        $this->assertNotNull($obj->getUri());
        $this->assertNotNull($obj->getStatus());
        $this->assertNotNull($obj->getMerchantInfo());
        $this->assertNotNull($obj->getBillingInfo());
        $this->assertNotNull($obj->getShippingInfo());
        $this->assertNotNull($obj->getItems());
        $this->assertNotNull($obj->getInvoiceDate());
        $this->assertNotNull($obj->getPaymentTerm());
        $this->assertNotNull($obj->getDiscount());
        $this->assertNotNull($obj->getShippingCost());
        $this->assertNotNull($obj->getCustom());
        $this->assertNotNull($obj->getTaxCalculatedAfterDiscount());
        $this->assertNotNull($obj->getTaxInclusive());
        $this->assertNotNull($obj->getTerms());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getMerchantMemo());
        $this->assertNotNull($obj->getLogoUrl());
        $this->assertNotNull($obj->getTotalAmount());
        $this->assertNotNull($obj->getPaymentDetails());
        $this->assertNotNull($obj->getRefundDetails());
        $this->assertNotNull($obj->getMetadata());
        $this->assertNotNull($obj->getAdditionalData());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Invoice $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getNumber(), "TestSample");
        $this->assertEquals($obj->getUri(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
        $this->assertEquals($obj->getMerchantInfo(), MerchantInfoTest::getObject());
        $this->assertEquals($obj->getBillingInfo(), BillingInfoTest::getObject());
        $this->assertEquals($obj->getShippingInfo(), ShippingInfoTest::getObject());
        $this->assertEquals($obj->getItems(), InvoiceItemTest::getObject());
        $this->assertEquals($obj->getInvoiceDate(), "TestSample");
        $this->assertEquals($obj->getPaymentTerm(), PaymentTermTest::getObject());
        $this->assertEquals($obj->getDiscount(), CostTest::getObject());
        $this->assertEquals($obj->getShippingCost(), ShippingCostTest::getObject());
        $this->assertEquals($obj->getCustom(), CustomAmountTest::getObject());
        $this->assertEquals($obj->getTaxCalculatedAfterDiscount(), true);
        $this->assertEquals($obj->getTaxInclusive(), true);
        $this->assertEquals($obj->getTerms(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getMerchantMemo(), "TestSample");
        $this->assertEquals($obj->getLogoUrl(), "http://www.google.com");
        $this->assertEquals($obj->getTotalAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPaymentDetails(), PaymentDetailTest::getObject());
        $this->assertEquals($obj->getRefundDetails(), RefundDetailTest::getObject());
        $this->assertEquals($obj->getMetadata(), MetadataTest::getObject());
        $this->assertEquals($obj->getAdditionalData(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Invoice $obj
     */
    public function testDeprecatedGetters($obj)
    {
        $this->assertEquals($obj->getMerchant_info(), MerchantInfoTest::getObject());
        $this->assertEquals($obj->getBilling_info(), BillingInfoTest::getObject());
        $this->assertEquals($obj->getShipping_info(), ShippingInfoTest::getObject());
        $this->assertEquals($obj->getInvoice_date(), "TestSample");
        $this->assertEquals($obj->getPayment_term(), PaymentTermTest::getObject());
        $this->assertEquals($obj->getShipping_cost(), ShippingCostTest::getObject());
        $this->assertEquals($obj->getTax_calculated_after_discount(), true);
        $this->assertEquals($obj->getTax_inclusive(), true);
        $this->assertEquals($obj->getMerchant_memo(), "TestSample");
        $this->assertEquals($obj->getLogo_url(), "http://www.google.com");
        $this->assertEquals($obj->getTotal_amount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPayment_details(), PaymentDetailTest::getObject());
        $this->assertEquals($obj->getRefund_details(), RefundDetailTest::getObject());
        $this->assertEquals($obj->getAdditional_data(), "TestSample");
    }

    /**
     * @depends testSerializationDeserialization
     * @param Invoice $obj
     */
    public function testDeprecatedSetterNormalGetter($obj)
    {

        // Check for Merchant_info
        $obj->setMerchantInfo(null);
        $this->assertNull($obj->getMerchant_info());
        $this->assertNull($obj->getMerchantInfo());
        $this->assertSame($obj->getMerchantInfo(), $obj->getMerchant_info());
        $obj->setMerchant_info(MerchantInfoTest::getObject());
        $this->assertEquals($obj->getMerchant_info(), MerchantInfoTest::getObject());

        // Check for Billing_info
        $obj->setBillingInfo(null);
        $this->assertNull($obj->getBilling_info());
        $this->assertNull($obj->getBillingInfo());
        $this->assertSame($obj->getBillingInfo(), $obj->getBilling_info());
        $obj->setBilling_info(BillingInfoTest::getObject());
        $this->assertEquals($obj->getBilling_info(), BillingInfoTest::getObject());

        // Check for Shipping_info
        $obj->setShippingInfo(null);
        $this->assertNull($obj->getShipping_info());
        $this->assertNull($obj->getShippingInfo());
        $this->assertSame($obj->getShippingInfo(), $obj->getShipping_info());
        $obj->setShipping_info(ShippingInfoTest::getObject());
        $this->assertEquals($obj->getShipping_info(), ShippingInfoTest::getObject());

        // Check for Invoice_date
        $obj->setInvoiceDate(null);
        $this->assertNull($obj->getInvoice_date());
        $this->assertNull($obj->getInvoiceDate());
        $this->assertSame($obj->getInvoiceDate(), $obj->getInvoice_date());
        $obj->setInvoice_date("TestSample");
        $this->assertEquals($obj->getInvoice_date(), "TestSample");

        // Check for Payment_term
        $obj->setPaymentTerm(null);
        $this->assertNull($obj->getPayment_term());
        $this->assertNull($obj->getPaymentTerm());
        $this->assertSame($obj->getPaymentTerm(), $obj->getPayment_term());
        $obj->setPayment_term(PaymentTermTest::getObject());
        $this->assertEquals($obj->getPayment_term(), PaymentTermTest::getObject());

        // Check for Shipping_cost
        $obj->setShippingCost(null);
        $this->assertNull($obj->getShipping_cost());
        $this->assertNull($obj->getShippingCost());
        $this->assertSame($obj->getShippingCost(), $obj->getShipping_cost());
        $obj->setShipping_cost(ShippingCostTest::getObject());
        $this->assertEquals($obj->getShipping_cost(), ShippingCostTest::getObject());

        // Check for Tax_calculated_after_discount
        $obj->setTaxCalculatedAfterDiscount(null);
        $this->assertNull($obj->getTax_calculated_after_discount());
        $this->assertNull($obj->getTaxCalculatedAfterDiscount());
        $this->assertSame($obj->getTaxCalculatedAfterDiscount(), $obj->getTax_calculated_after_discount());
        $obj->setTax_calculated_after_discount(true);
        $this->assertEquals($obj->getTax_calculated_after_discount(), true);

        // Check for Tax_inclusive
        $obj->setTaxInclusive(null);
        $this->assertNull($obj->getTax_inclusive());
        $this->assertNull($obj->getTaxInclusive());
        $this->assertSame($obj->getTaxInclusive(), $obj->getTax_inclusive());
        $obj->setTax_inclusive(true);
        $this->assertEquals($obj->getTax_inclusive(), true);

        // Check for Merchant_memo
        $obj->setMerchantMemo(null);
        $this->assertNull($obj->getMerchant_memo());
        $this->assertNull($obj->getMerchantMemo());
        $this->assertSame($obj->getMerchantMemo(), $obj->getMerchant_memo());
        $obj->setMerchant_memo("TestSample");
        $this->assertEquals($obj->getMerchant_memo(), "TestSample");

        // Check for Total_amount
        $obj->setTotalAmount(null);
        $this->assertNull($obj->getTotal_amount());
        $this->assertNull($obj->getTotalAmount());
        $this->assertSame($obj->getTotalAmount(), $obj->getTotal_amount());
        $obj->setTotal_amount(CurrencyTest::getObject());
        $this->assertEquals($obj->getTotal_amount(), CurrencyTest::getObject());

        // Check for Payment_details
        $obj->setPaymentDetails(null);
        $this->assertNull($obj->getPayment_details());
        $this->assertNull($obj->getPaymentDetails());
        $this->assertSame($obj->getPaymentDetails(), $obj->getPayment_details());
        $obj->setPayment_details(PaymentDetailTest::getObject());
        $this->assertEquals($obj->getPayment_details(), PaymentDetailTest::getObject());

        // Check for Refund_details
        $obj->setRefundDetails(null);
        $this->assertNull($obj->getRefund_details());
        $this->assertNull($obj->getRefundDetails());
        $this->assertSame($obj->getRefundDetails(), $obj->getRefund_details());
        $obj->setRefund_details(RefundDetailTest::getObject());
        $this->assertEquals($obj->getRefund_details(), RefundDetailTest::getObject());

        // Check for Additional_data
        $obj->setAdditionalData(null);
        $this->assertNull($obj->getAdditional_data());
        $this->assertNull($obj->getAdditionalData());
        $this->assertSame($obj->getAdditionalData(), $obj->getAdditional_data());
        $obj->setAdditional_data("TestSample");
        $this->assertEquals($obj->getAdditional_data(), "TestSample");

        //Test All Deprecated Getters and Normal Getters
        $this->testDeprecatedGetters($obj);
        $this->testGetters($obj);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage LogoUrl is not a fully qualified URL
     */
    public function testUrlValidationForLogoUrl()
    {
        $obj = new Invoice();
        $obj->setLogoUrl(null);
    }

    public function testUrlValidationForLogoUrlDeprecated()
    {
        $obj = new Invoice();
        $obj->setLogo_url(null);
        $this->assertNull($obj->getLogo_url());
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testSearch($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    InvoiceSearchResponseTest::getJson()
            ));
        $search = SearchTest::getObject();

        $result = $obj->search($search, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testSend($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));

        $result = $obj->send($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRemind($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $notification = NotificationTest::getObject();

        $result = $obj->remind($notification, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $cancelNotification = CancelNotificationTest::getObject();

        $result = $obj->cancel($cancelNotification, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRecordPayment($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $paymentDetail = PaymentDetailTest::getObject();

        $result = $obj->recordPayment($paymentDetail, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRecordRefund($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $refundDetail = RefundDetailTest::getObject();

        $result = $obj->recordRefund($refundDetail, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    InvoiceTest::getJson()
            ));

        $result = $obj->get("invoiceId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testGetAll($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    InvoiceSearchResponseTest::getJson()
            ));

        $result = $obj->getAll(array(), $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->update($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testDelete($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));

        $result = $obj->delete($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testQrCode($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PPRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    ImageTest::getJson()
            ));

        $result = $obj->qrCode("invoiceId", array(), $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();
        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }
}
