# PayPal SDK 2.0.0-beta 

This is a preview of how PayPal SDKs will look in the next major version. We've simplified the interface to only provide HTTPRequest that can easily be called via our HttpClient.

### Creating a Payment

```php
require 'vendor/autoload.php';

use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\Core\PayPalHttpClient;
use PayPal\Core\SandboxEnvironment;

$environment = new SandboxEnvironment('AdV4d6nLHabWLyemrw4BKdO9LjcnioNIOgoz7vD611ObbDUL0kJQfzrdhXEBwnH8QmV-7XZjvjRWn0kg', 'EPKoPC_haZMTq5uM9WXuzoxUVdgzVqHyD5avCyVC1NCIUJeVaNNUZMnzduYIqrdw-carG9LBAizFGMyK');
$client = new PayPalHttpClient($environment);

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
    $response = $client->execute($request);
    print_r($response);
} catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
```

If you're migrating from v1, check out our [Migration Guide](./docs/Migrating.md) or our [Frequently Asked Questions](./docs/FAQ.md).

## Building

To try this out, update the version of `paypal/rest-api-sdk-php` in your `composer.json` to `dev-2.0-beta`, and run `composer update`.

Please feel free to create an issue in this repo with any feedback, questions, or concerns you have.

## Running tests

To run unit tests, clone this repository and run the following command:
```sh
$ composer install
$ composer unit
```

To run integration tests using your client id and secret, clone this repository and run the following command:
```sh
$ composer install
$ composer integration
```

*NOTE*: This API is still in beta, is subject to change, and should not be used in production.

## Feedback

If you have any suggestions/remarks/feedback related to SDK 2.0.0, feel free to create an issue.

## License
PayPal-PHP-SDK is open source. See the [LICENSE](./LICENSE) file for more info.

## Contributions
Pull requests and new issues are welcome. See [CONTRIBUTING.md](CONTRIBUTING.md) for details.
