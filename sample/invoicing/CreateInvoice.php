<?php

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

$invoice
	->setMerchantInfo(new MerchantInfo())
	->setBillingInfo(array(new BillingInfo()))
	->setItems(array(new InvoiceItem()))
	->setNote("Medical Invoice 16 Jul, 2013 PST")
	->setPaymentTerm(new PaymentTerm())
	->setShippingInfo(new ShippingInfo());

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

$invoice->getMerchantInfo()->getAddress()
	->setLine1("1234 Main St.")
	->setCity("Portland")
	->setState("OR")
	->setPostalCode("97217")
	->setCountryCode("US");

$billing = $invoice->getBillingInfo();
$billing[0]
	->setEmail("example@example.com");

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

print(var_dump($invoice->toArray()));

try {
	$invoice->create($apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
	echo "Exception: " . $ex->getMessage() . PHP_EOL;
	var_dump($ex->getData());
	exit(1);
}
?>
<html>
<head>
	<title>Direct Credit card payments</title>
</head>
<body>
	<div>
		Created Invoice:
		<?php echo $invoice->getId();?>
	</div>
	<pre><?php var_dump($invoice->toArray());?></pre>
	<a href='../index.html'>Back</a>
</body>
</html>
