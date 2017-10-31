<?php

namespace PaypalNetSdk\Test;

use PayPalNetSdk\Test\TestEnvironment;
use PaypalNetSdk\PaypalHttpClient;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class TestHarness
{
    public static function client()
    {
        $environment = new TestEnvironment(getenv("BASE_URL"));
        return new PaypalHttpClient($environment);
    }
}
