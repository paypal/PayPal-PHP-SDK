<?php

require __DIR__ . '/../bootstrap.php';

$baseUrl = getBaseUrl() . '/UserConsentRedirect.php?success=true';

//Get User Consent
// The clientId is stored in the bootstrap file
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

