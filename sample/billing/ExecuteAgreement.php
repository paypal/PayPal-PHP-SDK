<?php

require __DIR__ . '/../bootstrap.php';
session_start();
if (isset($_GET['success']) && $_GET['success'] == 'true') {

    $token = $_GET['token'];

    $agreement = new \PayPal\Api\Agreement();

    try {
        $agreement->execute($token, $apiContext);
    } catch (Exception $ex) {
        ResultPrinter::printError("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $ex);
        exit(1);
    }
    ResultPrinter::printResult("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $agreement);

} else {
    ResultPrinter::printResult("User Cancelled the Approval", null);
}
