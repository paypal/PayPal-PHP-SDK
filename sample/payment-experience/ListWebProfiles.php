<?php

$apiContext = require __DIR__ . '/../bootstrap.php';

// ### Retrieve List of All Web Profiles
// Documentation available at https://developer.paypal.com/webapps/developer/docs/api/#list-web-experience-profiles

// Retrieve the list of all web profiles by calling the
// static `get_list` method on the WebProfile class.
// (See bootstrap.php for more on `ApiContext`)
try {
    $list = \PayPal\Api\WebProfile::get_list($apiContext);
} catch (\PayPal\Exception\PPConnectionException $ex) {
    ResultPrinter::printError("Get List of All Web Profiles", "Web Profiles", null, null, $ex);
    exit(1);
}
$result = '';
foreach ($list as $object) {
    $result .= $object->toJSON(128) . PHP_EOL;
}

ResultPrinter::printResult("Get List of All Web Profiles", "Web Profiles", null, null, $result);

return $list;
