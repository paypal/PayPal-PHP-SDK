<?php

// # Create Invoice Sample
// This sample code demonstrate how you can create
// an invoice.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;
use PayPal\Api\MerchantInfo;
use PayPal\Api\BillingInfo;
use PayPal\Api\InvoiceItem;
use PayPal\Api\Phone;
use PayPal\Api\Address;
use PayPal\Api\Currency;
use PayPal\Api\PaymentTerm;
use PayPal\Api\ShippingInfo;

$invoice = new Invoice();

// ### Invoice Info
// Fill in all the information that is
// required for invoice APIs
$invoice
    ->setMerchantInfo(new MerchantInfo())
    ->setBillingInfo(array(new BillingInfo()))
    ->setItems(array(new InvoiceItem()))
    ->setNote("Medical Invoice 16 Jul, 2013 PST")
    ->setPaymentTerm(new PaymentTerm())
    ->setShippingInfo(new ShippingInfo());

// ### Merchant Info
// A resource representing merchant information that can be
// used to identify merchant
$invoice->getMerchantInfo()
    ->setEmail("PPX.DevNet-facilitator@gmail.com")
    ->setFirstName("Dennis")
    ->setLastName("Doctor")
    ->setbusinessName("Medical Professionals, LLC")
    ->setPhone(new Phone())
    ->setAddress(new Address());

$invoice->getMerchantInfo()->getPhone()
    ->setCountryCode("001")
    ->setNationalNumber("5032141716");

// ### Address Information
// The address used for creating the invoice
$invoice->getMerchantInfo()->getAddress()
    ->setLine1("1234 Main St.")
    ->setCity("Portland")
    ->setState("OR")
    ->setPostalCode("97217")
    ->setCountryCode("US");

// ### Billing Information
// Set the email address for each billing
$billing = $invoice->getBillingInfo();
$billing[0]
    ->setEmail("example@example.com");

// ### Items List
// You could provide the list of all items for
// detailed breakdown of invoice
$items = $invoice->getItems();
$items[0]
    ->setName("Sutures")
    ->setQuantity(100)
    ->setUnitPrice(new Currency());

$items[0]->getUnitPrice()
    ->setCurrency("USD")
    ->setValue(5);

$invoice->getPaymentTerm()
    ->setTermType("NET_45");

// ### Shipping Information
$invoice->getShippingInfo()
    ->setFirstName("Sally")
    ->setLastName("Patient")
    ->setBusinessName("Not applicable")
    ->setPhone(new Phone())
    ->setAddress(new Address());

$invoice->getShippingInfo()->getPhone()
    ->setCountryCode("001")
    ->setNationalNumber("5039871234");

$invoice->getShippingInfo()->getAddress()
    ->setLine1("1234 Main St.")
    ->setCity("Portland")
    ->setState("OR")
    ->setPostalCode("97217")
    ->setCountryCode("US");

try {
    // ### Create Invoice
    // Create an invoice by calling the invoice->create() method
    // with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
    $invoice->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}
?>
<html>
<head>
    <title>Invoice Creation</title>
</head>
<body>
<div>
    Created Invoice:
    <?php echo $invoice->getId(); ?>
</div>
<pre><?php echo $invoice->toJSON(JSON_PRETTY_PRINT); ?></pre>
<a href='../index.html'>Back</a>
</body>
</html>
