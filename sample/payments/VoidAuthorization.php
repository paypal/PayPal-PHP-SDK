<?php
// # VoidAuthorization
// This sample code demonstrates how you can 
// void an authorized payment.
// API used: /v1/payments/authorization/<{authorizationid}>/void"

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;


// ### VoidAuthorization
// You can void a previously authorized payment
// by invoking the $authorization->void method
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
try {
	// create an authorization to get authorization Id
	// createAuthorization is defined in common.php
	$authId = createAuthorization($apiContext);

	// Lookup the authorization
	$authorization = Authorization::get($authId, $apiContext);

	// Void the authorization 
	$voidedAuth = $authorization->void($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Void an authorization</title>
</head>
<body>
	<div>
		Voided authorization
	</div>
	<pre><?php var_dump($voidedAuth->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
