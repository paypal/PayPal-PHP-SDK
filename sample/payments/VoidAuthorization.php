<?php
// # VoidAuthorization
// This sample code demonstrate how you can void an authorized payment
// API used: /v1/payments/authorization/<{authorizationid}>/void"

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;

$authorization = Authorization::get('87U86133WD4359724', $apiContext);


// ### VoidAuthorization
// VoidAuthorization by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$void = $authorization->void($apiContext);
} catch (\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Void Authorization:
	</div>
	<pre><?php var_dump($void->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
