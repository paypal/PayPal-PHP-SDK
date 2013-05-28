<?php
// # GetAuthorization
// This sample code demonstrate how you can get details of an authorized payment
// API used: /v1/payments/authorization/<$authorizationId>

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Authorization;

// ### GetAuthorization
// GetAuthorization by posting to the APIService
// using a valid ApiContext (See bootstrap.php for more on `ApiContext`)
// The return object contains the status;
try {
	$authorization = Authorization::get('1FR49283DF589111P', $apiContext);
} catch (\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<body>
	<div>
		Get Authorization:
		<?php echo $authorization->getId();?>
	</div>
	<pre><?php var_dump($authorization->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
