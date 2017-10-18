<?php

namespace PayPal\Core;

class SandboxEnvironment extends PayPalEnvironment
{
    public function baseUrl()
    {
        return "https://api.sandbox.PayPal.com";
    }
}
