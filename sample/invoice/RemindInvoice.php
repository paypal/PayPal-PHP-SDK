<?php

// # Remind Invoice Sample
// This sample code demonstrate how you can remind
// an invoice to the payer

require __DIR__ . '/../bootstrap.php';

use PayPal\Api\Invoice;
use PayPal\Api\Notification;

try {
    // ### Retrieve Invoice
    // Retrieve the invoice object by calling the
    // static `get` method
    // on the Invoice class by passing a valid
    // Invoice ID
    // (See bootstrap.php for more on `ApiContext`)
    $invoice = Invoice::get("INV2-9CAH-K5G7-2JPL-G4B4", $apiContext);

    // ### Notification Object
    // This would send a notification to both merchant as well
    // the payer. The information of merchant
    // and payer is retrieved from the invoice details
    $notify = new Notification();
    $notify
        ->setSubject("Past due")
        ->setNote("Please pay soon")
        ->setSendToMerchant(true);

    // ### Remind Invoice
    // Remind the notifiers by calling the
    // `remind` method
    // on the Invoice class by passing a valid
    // notification object
    // (See bootstrap.php for more on `ApiContext`)
    $remindStatus = $invoice->remind($notify, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

?>

<html>
<head>
    <title>Remind Invoice</title>
</head>
<body>
<div>Remind Invoice:</div>
<pre><?php echo $invoice->toJSON(JSON_PRETTY_PRINT); ?></pre>
<a href='../index.html'>Back</a>
</body>
</html>
