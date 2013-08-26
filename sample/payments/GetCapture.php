<?php
// # GetCapture
// This sample code demonstrates how you can lookup the details 
// of a captured payment.
// API used: /v1/payments/capture/<$captureId>

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Capture;
use PayPal\Api\Amount;
use PayPal\Api\Authorization;


// ### Create a mock Capture
try {
	// create a mock authorization to get authorization Id
	// createAuthorization is defined in common.php
	$authId = createAuthorization($apiContext);

	// Lookup the authorization
	$authorization = Authorization::get($authId, $apiContext);

	### Capture
	
	$amt = new Amount();
	$amt->setCurrency("USD")
		->setTotal("1.00");
	
	// Create a capture
	$captureInfo = new Capture();
	$captureInfo->setId($authId)
		->setAmount($amt);

	$capture = $authorization->capture($captureInfo, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}

// ### Retrieve Capture details
// You can look up a capture by invoking the Capture::get method 
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
try {
	$capture = Capture::get($capture->getId(), $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Lookup a capture</title>
</head>
<body>
	<div>
		Capture Id:
		<?php echo $capture->getId();?>
	</div>
	<pre><?php var_dump($capture->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
