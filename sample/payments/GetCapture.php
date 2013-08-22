<?php
// # GetCapture
// This sample code demonstrate how you can get the details of Captured Payment
// API used: /v1/payments/capture/<$captureId>

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Capture;
use PayPal\Api\Amount;
use PayPal\Api\Authorization;


// ### Create a mock Capture
try {
	// create payment to get authorization Id
	$authId = createAuthorization($apiContext);
	$amt = new Amount();
	$amt->setCurrency("USD")
		->setTotal("1.00");

	### Capture
	$captur = new Capture();
	$captur->setId($authId)
		->setAmount($amt);

	// get the authorization
	$authorization = Authorization::get($authId, $apiContext);

	// Create a capture
	$capt = $authorization->capture($captur, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

// ### Retrieve Capture details
// You can look up a capture by invoking the Capture::get method 
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
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
		Capture Id:
		<?php echo $capture->getId();?>
	</div>
	<pre><?php var_dump($capture->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
