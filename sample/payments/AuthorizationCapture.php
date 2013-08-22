<?php
// # AuthorizationCapture
// This sample code demonstrate how you can capture the authorized payment
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Amount;
use PayPal\Api\Capture;
use PayPal\Api\Authorization;


// ### Capture Payment
// You can capture and process a previously created authorization
// by invoking the $authorization->capture method
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
try {
	// create payment to get authorization Id
	// createAuthorization defined in common.php
	$authId = createAuthorization($apiContext);

	$amt = new Amount();
	$amt->setCurrency("USD")
		->setTotal("1.00");

	### Capture
	$capture = new Capture();
	$capture->setId($authId)
		->setAmount($amt);

	// Get the authorization
	$authorization = Authorization::get($authId, $apiContext);

	$getCapture = $authorization->capture($capture, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Captured payment <?php echo $getCapture->getParentPayment(); ?>. Capture Id:
		<?php echo $getCapture->getId();?>
	</div>
	<pre>
		<?php var_dump($getCapture->toArray());?>
	</pre>
	<a href='../index.html'>Back</a>
</body>
</html>
