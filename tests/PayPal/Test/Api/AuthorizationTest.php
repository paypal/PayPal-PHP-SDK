<?php
namespace PayPal\Test\Api;

use PayPal\Api\Amount;
use PayPal\Api\Authorization;
use PayPal\Api\Links;
use PayPal\Test\Constants;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Address;

use PayPal\Api\Capture;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;
use PayPal\Exception\PPConnectionException;

class AuthorizationTest extends \PHPUnit_Framework_TestCase {
	private $authorizations = array();
	public static $create_time = "2013-02-28T00:00:00Z";
    public static $update_time = "2013-03-28T00:00:00Z";
	public static $id = "AUTH-123";
	public static $state = "Created";
	public static $parent_payment = "PAY-12345";
    public static $valid_until = "2013-04-28T00:00:00Z";
	public static $currency = "USD";
	public static $total = "1.12";
	public static $href = "USD";
	public static $rel = "1.12";
	public static $method = "1.12";
	
	public static function createAuthorization() {			
		$authorization = new Authorization();
		$authorization->setCreateTime(self::$create_time);
		$authorization->setId(self::$id);
		$authorization->setState(self::$state);
		
		$authorization->setAmount(AmountTest::createAmount());
		$authorization->setLinks(array(LinksTest::createLinks()));	
		
		return $authorization;
	}
	
	public static function authorize()
	{
		$addr = new Address();
		$addr->setLine1("3909 Witmer Road");
		$addr->setLine2("Niagara Falls");
		$addr->setCity("Niagara Falls");
		$addr->setState("NY");
		$addr->setPostalCode("14305");
		$addr->setCountryCode("US");
		$addr->setPhone("716-298-1822");
		
		$card = new CreditCard();
		$card->setType("visa");
		$card->setNumber("4417119669820331");
		$card->setExpireMonth("11");
		$card->setExpireYear("2019");
		$card->setCvv2("012");
		$card->setFirstName("Joe");
		$card->setLastName("Shopper");
		$card->setBillingAddress($addr);
		
		$fi = new FundingInstrument();
		$fi->setCreditCard($card);
		
		$payer = new Payer();
		$payer->setPaymentMethod("credit_card");
		$payer->setFundingInstruments(array($fi));
		
		$amount = new Amount();
		$amount->setCurrency("USD");
		$amount->setTotal("1.00");
		
		$transaction = new Transaction();
		$transaction->setAmount($amount);
		$transaction->setDescription("This is the payment description.");
		
		$payment = new Payment();
		$payment->setIntent("authorize");
		$payment->setPayer($payer);
		$payment->setTransactions(array($transaction));
		
		$paymnt = $payment->create();
		$resArray = $paymnt->toArray();
		
		return $authId = $resArray['transactions'][0]['related_resources'][0]['authorization']['id'];
		
	}
	public function setup() {
		$authorization = new Authorization();
		$authorization->setCreateTime(self::$create_time);
        $authorization->setUpdateTime(self::$update_time);
		$authorization->setId(self::$id);
		$authorization->setState(self::$state);
		$authorization->setParentPayment(self::$parent_payment);
        $authorization->setValidUntil(self::$valid_until);
		$this->authorizations['partial'] = $authorization;
		$this->authorizations['full'] = self::createAuthorization();
		
	}

	public function testGetterSetter() {
		$authorization = $this->authorizations['partial'];
		$this->assertEquals(self::$create_time, $authorization->getCreateTime());
        $this->assertEquals(self::$update_time, $authorization->getUpdateTime());
		$this->assertEquals(self::$id, $authorization->getId());
		$this->assertEquals(self::$state, $authorization->getState());
		$this->assertEquals(self::$parent_payment, $authorization->getParentPayment());
        $this->assertEquals(self::$valid_until, $authorization->getValidUntil());
		
		$authorization = $this->authorizations['full'];
		$this->assertEquals(AmountTest::$currency, $authorization->getAmount()->getCurrency());
		$this->assertEquals(1, count($authorization->getLinks()));
	}
	
	public function testSerializeDeserialize() {
		$a1 = $this->authorizations['partial'];
		$a2 = new Authorization();
		$a2->fromJson($a1->toJson());
		$this->assertEquals($a1, $a2);
	}

    /**
     * @group integration
     */
	public function testOperations() {
        try {
            $authId = self::authorize();
            $auth = Authorization::get($authId);
            $this->assertNotNull($auth->getId());

            $amount = new Amount();
            $amount->setCurrency("USD");
            $amount->setTotal("1.00");

            $captur = new Capture();
            $captur->setId($authId);
            $captur->setAmount($amount);

            $capt = $auth->capture($captur);
            $this->assertNotNull( $capt->getId());

            $authId = self::authorize();
            $auth = Authorization::get($authId);
            $void = $auth->void();
            $this->assertNotNull($void->getId());

            $auth->setId(null);
            try {
                $auth->void();
            } catch (\InvalidArgumentException $ex) {
                $this->assertEquals($ex->getMessage(), "Id cannot be null");
            }
        } catch (PPConnectionException $ex) {
            $this->markTestSkipped(
                'Tests failing because of intermittent failures in Paypal Sandbox environment.' . $ex->getMessage()
            );
        }
	}

    /**
     * @group integration
     */
	public function testReauthorize() {
		$authorization = Authorization::get('7GH53639GA425732B');
	
		$amount = new Amount();
		$amount->setCurrency("USD");
		$amount->setTotal("1.00");
		
		$authorization->setAmount($amount);
		try {
			$authorization->reauthorize();
		} catch (PPConnectionException $ex){
            //var_dump($ex->getMessage());
			$this->assertEquals(strpos($ex->getMessage(),"500"), false);
		}

        $authorization->setId(null);
        try {
            $authorization->reauthorize();
        } catch (\InvalidArgumentException $ex) {
            $this->assertEquals($ex->getMessage(), "Id cannot be null");
        }
	}
}
