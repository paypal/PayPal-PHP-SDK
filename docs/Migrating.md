# Migrating from Version 1 to Version 2

## 1. Initialize SDK

#### BEFORE
```php
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'client-id',
        'client-secret'
    )
);

$apiContext->setConfig(
    array('mode' => 'live')
);
```

#### AFTER
```php
use PayPal\Core\PayPalHttpClient;
use PayPal\Core\SandboxEnvironment;

$environment = new SandboxEnvironment('client-id', 'client-secret'); // Use `ProductionEnvironment` for production
$client = new PayPalHttpClient($environment);
```

# 2. Make a call

#### BEFORE
```php
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('1.00');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
    ->setCancelUrl("https://example.com/your_cancel_url.html");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

try {
    $payment->create($apiContext);
    echo $payment;
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getData();
}
```

#### AFTER
```php
$body = [
    "intent" => "sale",
    "transactions" => [
        [
            "amount" => [
                "total" => "10",
                "currency" => "USD"
            ]
        ]
    ],
    "redirect_urls" => [
        "cancel_url" => "http://paypal.com/cancel",
        "return_url" => "http://paypal.com/return"
    ],
    "payer" => [
        "payment_method" => "paypal"
    ]
];

$request = new PaymentCreateRequest();
$request->body = $body;

try {
    return $client->execute($request);
} catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
```

