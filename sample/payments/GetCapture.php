<?php
// # GetCapture
// This sample code demonstrate how you can get the details of Captured Payment
// API used: /v1/payments/capture/<$captureId>

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Capture;

// ### Get Capture
// Get Capture by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$capture = Capture::get('7BA08426L46375838', $apiContext);
} catch (\PPConnectionException $ex) {
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
