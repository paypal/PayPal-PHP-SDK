<?php

namespace PayPal\Core;


class ProductionEnvironment extends PayPalEnvironment
{
    public function baseUrl()
    {
        return "https://api.PayPal.com";
    }
}
