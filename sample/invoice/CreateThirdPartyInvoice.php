<?php

// # Create Third Party Invoice Sample
// This sample code demonstrate how you can create third party invoice on someone else's behalf.
// This requires using `Obtain User's Consent` to fetch the refresh token of the third party merchant. Please look at http://paypal.github.io/PayPal-PHP-SDK/sample/doc/lipp/ObtainUserConsent.html for more info.
// You need the email address of the third party. This can be retrieved using the refresh token obtained from previous call. Please refer to http://paypal.github.io/PayPal-PHP-SDK/sample/doc/lipp/GetUserInfo.html for more info.
// Please make sure to use `merchantInfo.email` as the email address of the third party.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\BillingInfo;
use PayPal\Api\Currency;
use PayPal\Api\Invoice;
use PayPal\Api\InvoiceAddress;
use PayPal\Api\InvoiceItem;
use PayPal\Api\MerchantInfo;
use PayPal\Api\PaymentTerm;
use PayPal\Api\ShippingInfo;

// Step 1. This would be refresh token retrieved from http://paypal.github.io/PayPal-PHP-SDK/sample/doc/lipp/ObtainUserConsent.html
$refreshToken = "SCNWVZfdg43XaOmoEicazpkXyda32CGnP208EkuQ_QBIrXCYMhlvORFHHyoXPT0VbEMIHYVJEm0gVf1Vf72YgJzPScBenKoVPq__y1QRT7wwJo3WYADwUW4Q5ic";

// Step 2. Get the email address of third party merchant who you want to create this invoice for. 
// This can be retrieved using the refresh token obtained from previous call. Please refer to http://paypal.github.io/PayPal-PHP-SDK/sample/doc/lipp/GetUserInfo.html for more info.
$thirdPartyMerchant = "developer@sample.com";
    
// Step 3. Create an invoice object.
// Make sure to set `$invoice->getMerchantInfo()->setEmail()` with the third party merchant email you retrieved from Step 2.
$invoice = new Invoice();

// ### Invoice Info
// Fill in all the information that is
// required for invoice APIs
$invoice
    ->setMerchantInfo(new MerchantInfo())
    ->setBillingInfo(array(new BillingInfo()))
    ->setNote("Medical Invoice 16 Jul, 2013 PST")
    ->setPaymentTerm(new PaymentTerm());

// ### Merchant Info
// A resource representing merchant information that can be
// used to identify merchant
$invoice->getMerchantInfo()
    // This would be the email address of third party merchant.
    ->setEmail($thirdPartyMerchant)
    ->setFirstName("Dennis")
    ->setLastName("Doctor")
    ->setbusinessName("Medical Professionals, LLC")
    ->setAddress(new InvoiceAddress());

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
    ->setEmail("sample@buy.com");

$billing[0]->setBusinessName("Jay Inc")
    ->setAdditionalInfo("This is the billing Info")
    ->setAddress(new InvoiceAddress());

$billing[0]->getAddress()
    ->setLine1("1234 Main St.")
    ->setCity("Portland")
    ->setState("OR")
    ->setPostalCode("97217")
    ->setCountryCode("US");

// ### Items List
// You could provide the list of all items for
// detailed breakdown of invoice
$items = array();
$items[0] = new InvoiceItem();
$items[0]
    ->setName("Sutures")
    ->setQuantity(100)
    ->setUnitPrice(new Currency());

$items[0]->getUnitPrice()
    ->setCurrency("USD")
    ->setValue(5);

$invoice->getPaymentTerm()
    ->setTermType("NET_45");


// For Sample Purposes Only.
$request = clone $invoice;


try {
    // ### Use Refresh Token obtained from Step 1. 
    $invoice->updateAccessToken($refreshToken, $apiContext);

    // ### Create Invoice
    // Create an invoice by calling the invoice->create() method
    // with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
    $invoice->create($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Create Third Party Invoice", "Invoice", null, $request, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Create Third Party Invoice", "Invoice", $invoice->getId(), $request, $invoice);


// ### Send Invoice
try {

    // ### Send Invoice
    $invoice->send($apiContext);
    $invoice = Invoice::get($invoice->getId(), $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Send Third Party Invoice", "Invoice", null, $request, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("Send Third Party Invoice", "Invoice", $invoice->getId(), $request, $invoice);

return $invoice;
