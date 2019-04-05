<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payment;
use PayPal\Api\ReportingTransactionInfo;
use PHPUnit\Framework\TestCase;
use PayPal\Api\ReportingTransactions;

class ReportingTransactionsTest extends TestCase
{
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                ReportingTransactionsTest::getJson()
            ));

        $params = array('count' => 100, 'start_date' => '2019-03-20T00:00:00-0700', 'end_date' => '2019-04-10T23:59:59-0700', 'fields' => 'all', 'page' => 1);

        /** @var \PayPal\Api\ReportingTransactions $transactions */
        $transactions = $obj->get($params, $mockApiContext, $mockPPRestCall);
        $this->assertInstanceOf('\PayPal\Api\ReportingTransactions', $transactions);
        $transaction_details = $transactions->getTransactionDetails();
        $this->assertTrue(is_array($transaction_details));
        $this->assertInstanceOf('\PayPal\Api\ReportingTransactionDetails', reset($transaction_details));
        /** @var ReportingTransactionInfo $transaction_info */
        $transaction_info = $transaction_details[0]->getTransactionInfo();
        $this->assertInstanceOf('\PayPal\Api\ReportingTransactionInfo', $transaction_info);
        $this->assertEquals($transaction_info->getTransactionAmount()->getValue(), '50.00');
        $this->assertEquals($transaction_info->getTransactionAmount()->getCurrencyCode(), 'EUR');
        $this->assertEquals($transaction_info->getEndingBalance()->getValue(), '50.00');
        $this->assertEquals($transaction_info->getEndingBalance()->getCurrencyCode(), 'EUR');
        $this->assertEquals($transaction_info->getAvailableBalance()->getValue(), '50.00');
        $this->assertEquals($transaction_info->getAvailableBalance()->getCurrencyCode(), 'EUR');
        $this->assertEquals($transaction_info->getFeeAmount()->getValue(), '-42.31');
        $this->assertEquals($transaction_info->getFeeAmount()->getCurrencyCode(), 'EUR');
        $this->assertEquals($transaction_info->getInvoiceId(), '22892-1554291060');
        $this->assertEquals($transaction_info->getTransactionId(), '61041S');
        $this->assertEquals($transaction_info->getTransactionEventCode(), 'T0007');
        $this->assertEquals($transaction_info->getTransactionInitiationDate(), '2019-04-03T11:33:04+0000');
        $this->assertEquals($transaction_info->getTransactionUpdatedDate(), '2019-04-03T11:33:04+0000');
        $this->assertEquals($transaction_info->getProtectionEligibility(), '01');
        $this->assertEquals($transaction_info->getPaypalAccountId(), '1234');
    }

    public static function getJson()
    {
        return '{"transaction_details":[{"transaction_info":{"paypal_account_id":"1234","transaction_id":"61041S","transaction_event_code":"T0007","transaction_initiation_date":"2019-04-03T11:33:04+0000","transaction_updated_date":"2019-04-03T11:33:04+0000","transaction_amount":{"currency_code":"EUR","value":"50.00"},"fee_amount":{"currency_code":"EUR","value":"-42.31"},"transaction_status":"S","ending_balance":{"currency_code":"EUR","value":"50.00"},"available_balance":{"currency_code":"EUR","value":"50.00"},"invoice_id":"22892-1554291060","protection_eligibility":"01"},"payer_info":{"account_id":"1234","email_address":"debug@example.com","address_status":"N","payer_status":"Y","payer_name":{"given_name":"test","surname":"buyer","alternate_full_name":"test buyer"},"country_code":"ES"},"shipping_info":{"name":"test, buyer"},"cart_info":{"item_details":[{"item_name":"Example","item_quantity":"1","item_unit_price":{"currency_code":"EUR","value":"50.00"},"item_amount":{"currency_code":"EUR","value":"50.00"},"total_item_amount":{"currency_code":"EUR","value":"50.00"},"invoice_number":"22892-1554291060","checkout_options":[{"checkout_option_name":"Product quantity","checkout_option_value":"1"}]}]},"store_info":{},"auction_info":{},"incentive_info":{}}],"account_number":"12345Y","start_date":"2019-03-20T07:00:00+0000","end_date":"2019-04-04T08:59:59+0000","last_refreshed_datetime":"2019-04-04T08:59:59+0000","page":1,"total_items":2,"total_pages":1,"links":[{"href":"https://api.sandbox.paypal.com/v1/reporting/transactions?start_date=2019-03-20T00%3A00%3A00-0700&end_date=2019-04-10T23%3A59%3A59-0700&fields=all&page_size=100&page=1","rel":"self","method":"GET"}]}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payment
     */
    public static function getObject()
    {
        return new ReportingTransactions(self::getJson());
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
