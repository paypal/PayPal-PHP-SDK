<?php
// # AuthorizationCapture
// This sample code demonstrate how you can capture the authorized payment
// API used: /v1/payments/payment

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Capture;
use PayPal\Api\Authorization;
use PayPal\Api\Amount;

### Amount
//Let's you specify a payment amount.
 $amount = new Amount();
 $amount->setCurrency("USD");
 $amount->setTotal("1.00");


### Capture

$captur = new Capture();
$captur->setId('5RA45624N3531924N');
$captur->setAmount($amount);

// get the authorization
$authorization = Authorization::get('8UA90289RG279654G', $apiContext);

// ### Capture Payment
// Capture Payment by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$capt = $authorization->capture($captur, $apiContext);
} catch (\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Capture payment:
		<?php echo $capt->getId();?>
	</div>
	<pre><?php var_dump($capt->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
