<?php
// # GetAuthorization
// This sample code demonstrates how you can get details 
// of an authorized payment.
// API used: /v1/payments/authorization/<$authorizationId>

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;


// ### GetAuthorization
// You can retrieve info about an Authorization
// by invoking the Authorization::get method
// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the authorization state.

try {
	// create a authorization to get authorization Id
	// createAuthorization is defined in common.php
	$authId = createAuthorization($apiContext);
	
	// Retrieve the authorization
	$authorization = Authorization::get($authId, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Lookup an authorization</title>
</head>
<body>
	<div>
		Retrieved Authorization:
		<?php echo $authorization->getId();?>
	</div>
	<pre><?php var_dump($authorization->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
