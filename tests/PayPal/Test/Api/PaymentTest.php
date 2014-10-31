<?php
namespace PayPal\Test\Api;

use PayPal\Api\RedirectUrls;
use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;
use PayPal\Test\Constants;

class PaymentTest extends \PHPUnit_Framework_TestCase
{

    private $payments;

    public static function createPayment()
    {

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://localhost/return");
        $redirectUrls->setCancelUrl("http://localhost/cancel");

        $payment = new Payment();
        $payment->setIntent("sale");
        $payment->setRedirectUrls($redirectUrls);
        $payment->setPayer(PayerTest::getObject());
        $payment->setTransactions(array(TransactionTest::createTransaction()));

        return $payment;
    }

    public static function createNewPayment()
    {

        $funding = FundingInstrumentTest::getObject();
        $funding->credit_card_token = null;

        $payer = new Payer();
        $payer->setPaymentMethod("credit_card");
        $payer->setFundingInstruments(array($funding));

        $transaction = new Transaction();
        $transaction->setAmount(AmountTest::createAmount());
        $transaction->setDescription("This is the payment description.");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://localhost/return");
        $redirectUrls->setCancelUrl("http://localhost/cancel");

        $payment = new Payment();
        $payment->setIntent("sale");
        $payment->setRedirectUrls($redirectUrls);
        $payment->setPayer($payer);
        $payment->setTransactions(array($transaction));

        return $payment;
    }

    public function setup()
    {
        $this->payments['full'] = self::createPayment();
        $this->payments['new'] = self::createNewPayment();
    }

    public function testSerializeDeserialize()
    {
        $p2 = new Payment();
        $p2->fromJson($this->payments['full']->toJSON());
        $this->assertEquals($p2, $this->payments['full']);
    }

    /**
     * @group integration
     *
     * Tests Additional_fields, shipping_discount and insurance information.
     * Additional Information: https://developer.paypal.com/docs/integration/direct/explore-payment-capabilities/
     */
    public function testECParameters()
    {
        $json = '{
    "intent": "sale",
    "redirect_urls": {
        "return_url": "http://www.return.com",
        "cancel_url": "http://www.cancel.com"
    },
    "payer": {
        "payment_method": "paypal",
        "payer_info": {
            "tax_id_type": "BR_CPF",
            "tax_id": "Fh618775690"
        }
    },
    "transactions": [
        {
            "amount": {
                "total": "34.07",
                "currency": "USD",
                "details": {
                    "subtotal": "30.00",
                    "tax": "0.07",
                    "shipping": "1.00",
                    "handling_fee": "1.00",
                    "shipping_discount": "1.00",
                    "insurance": "1.00"
                }
            },
            "description": "This is the payment transaction description.",
            "custom": "EBAY_EMS_90048630024435",
            "invoice_number": "48787589677",
            "payment_options": {
                "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
            },
            "soft_descriptor": "ECHI5786786",
            "item_list": {
                "items": [
                    {
                        "name": "bowling",
                        "description": "Bowling Team Shirt",
                        "quantity": "5",
                        "price": "3",
                        "tax": "0.01",
                        "sku": "1",
                        "currency": "USD"
                    },
                    {
                        "name": "mesh",
                        "description": "80s Mesh Sleeveless Shirt",
                        "quantity": "1",
                        "price": "15",
                        "tax": "0.02",
                        "sku": "product34",
                        "currency": "USD"
                    }
                ],
                "shipping_address": {
                    "recipient_name": "Betsy Buyer",
                    "line1": "111 First Street",
                    "city": "Saratoga",
                    "country_code": "US",
                    "postal_code": "95070",
                    "state": "CA"
                }
            }
        }
    ]
}';
        $payment = new Payment();
        $payment->fromJson($json);

        $payment->create();

        $result = Payment::get($payment->getId());
        $transactions = $result->getTransactions();
        $transaction = $transactions[0];
        $this->assertEquals($transaction->getAmount()->getDetails()->getShippingDiscount(), '1.00');
        $this->assertEquals($transaction->getAmount()->getDetails()->getInsurance(), '1.00');
        $this->assertEquals($transaction->getAmount()->getDetails()->getHandlingFee(), '1.00');
    }
}
