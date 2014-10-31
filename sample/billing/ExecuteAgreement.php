<?php

require __DIR__ . '/../bootstrap.php';
session_start();
if (isset($_GET['success']) && $_GET['success'] == 'true') {

    $token = $_GET['token'];

    $agreement = new \PayPal\Api\Agreement();

    try {
        $agreement->execute($token, $apiContext);
    } catch (PayPal\Exception\PPConnectionException $ex) {
        echo "Exception: " . $ex->getMessage() . PHP_EOL;
        var_dump($ex->getData());
        exit(1);
    }
    ResultPrinter::printResult("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $agreement);

} else {
    ResultPrinter::printResult("User Cancelled the Approval", null);
}
