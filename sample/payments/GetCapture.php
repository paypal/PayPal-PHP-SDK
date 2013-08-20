<?php
// # GetCapture
// This sample code demonstrate how you can get the details of Captured Payment
// API used: /v1/payments/capture/<$captureId>

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Capture;
use PayPal\Api\Address;
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Transaction;
use PayPal\Api\Authorization;


// ### Capture Payment
// Capture Payment by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	// create payment to get authorization Id
	$authId = createAuthorization($apiContext);
	$amt = new Amount();
	$amt->setCurrency("USD");
	$amt->setTotal("1.00");

	### Capture
	$captur = new Capture();
	$captur->setId($authId);
	$captur->setAmount($amt);

	// get the authorization
	$authorization = Authorization::get($authId, $apiContext);
	
	$capt = $authorization->capture($captur, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

// ### Get Capture
// Get Capture by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$capture = Capture::get($capt->getId(), $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Get Capture :
		<?php echo $capture->getId();?>
	</div>
	<pre><?php var_dump($capture->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
<?php 
function createAuthorization($apiContext)
{
	$addr = new Address();
	$addr->setLine1("3909 Witmer Road");
	$addr->setLine2("Niagara Falls");
	$addr->setCity("Niagara Falls");
	$addr->setState("NY");
	$addr->setPostal_code("14305");
	$addr->setCountry_code("US");
	$addr->setPhone("716-298-1822");
	
	$card = new CreditCard();
	$card->setType("visa");
	$card->setNumber("4417119669820331");
	$card->setExpire_month("11");
	$card->setExpire_year("2019");
	$card->setCvv2("012");
	$card->setFirst_name("Joe");
	$card->setLast_name("Shopper");
	$card->setBilling_address($addr);
	
	$fi = new FundingInstrument();
	$fi->setCredit_card($card);
	
	$payer = new Payer();
	$payer->setPayment_method("credit_card");
	$payer->setFunding_instruments(array($fi));
	
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
	
	$paymnt = $payment->create($apiContext);
	$resArray = $paymnt->toArray();
	
	return $authId = $resArray['transactions'][0]['related_resources'][0]['authorization']['id'];
}
