<?php

// Include the composer autoloader
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
if (!ini_get('date.timezone')) {
    date_default_timezone_set('GMT');
}
$loader->add('PayPal\\Test', __DIR__);
if (!defined("PP_CONFIG_PATH")) {
    define("PP_CONFIG_PATH", __DIR__);
}
