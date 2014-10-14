<?php

require __DIR__ . '/../bootstrap.php';


$clientId = 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS';
$clientSecret = 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL';

$baseUrl = getBaseUrl() . '/ExecuteAuth.php?success=true';

//Get User Consent
$redirectUrl = \PayPal\Auth\Openid\PPOpenIdSession::getAuthorizationUrl(
    $baseUrl,
    array('profile', 'email', 'phone'),
    $clientId,
    null,
    null,
    $apiContext
);

header("Location: $redirectUrl");
exit;

