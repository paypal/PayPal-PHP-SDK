<?php

namespace PayPal\Test;

use PayPal\Core\PayPalHttpClient;
use PayPal\Core\SandboxEnvironment;

class TestHarness
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AdV4d6nLHabWLyemrw4BKdO9LjcnioNIOgoz7vD611ObbDUL0kJQfzrdhXEBwnH8QmV-7XZjvjRWn0kg";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EPKoPC_haZMTq5uM9WXuzoxUVdgzVqHyD5avCyVC1NCIUJeVaNNUZMnzduYIqrdw-carG9LBAizFGMyK";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
