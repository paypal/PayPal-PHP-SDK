<?php

// # Cancel Invoice Sample
// This sample code demonstrate how you can cancel
// an invoice.

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Invoice;
use PayPal\Api\CancelNotification;

try {
    // ### Retrieve Invoice
    // Retrieve the invoice object by calling the
    // static `get` method
    // on the Payment class by passing a valid
    // Invoice ID
    // (See bootstrap.php for more on `ApiContext`)
    $invoice = Invoice::get("INV2-CJL7-PF4G-BLQF-5FWG", $apiContext);

    // ### Cancel Notification Object
    // This would send a notification to both merchant as well
    // the payer about the cancellation. The information of
    // merchant and payer is retrieved from the invoice details
    $notify = new CancelNotification();
    $notify
        ->setSubject("Past due")
        ->setNote("Canceling invoice")
        ->setSendToMerchant(true)
        ->setSendToPayer(true);


    // ### Cancel Invoice
    // Cancel invoice object by calling the
    // static `cancel` method
    // on the Invoice class by passing a valid
    // notification object
    // (See bootstrap.php for more on `ApiContext`)
    $cancelStatus = $invoice->cancel($notify, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

?>

<html>
<head>
    <title>Cancel Invoice</title>
</head>
<body>
<div>Cancel Invoice:</div>
<pre><?php echo $invoice->toJSON(JSON_PRETTY_PRINT); ?></pre>
<a href='../index.html'>Back</a>
</body>
</html>
