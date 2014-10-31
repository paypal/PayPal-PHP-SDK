<?php

require __DIR__ . '/../bootstrap.php';

use PayPal\Auth\Openid\PPOpenIdSession;

$baseUrl = getBaseUrl() . '/UserConsentRedirect.php?success=true';

// ### Get User Consent URL
// The clientId is stored in the bootstrap file

//Get Authorization URL returns the redirect URL that could be used to get user's consent
$redirectUrl = PPOpenIdSession::getAuthorizationUrl(
    $baseUrl,
    array('profile', 'email', 'phone'),
    null,
    null,
    null,
    $apiContext
);

ResultPrinter::printResult("Generated the User Consent URL", "URL", '<a href="'. $redirectUrl . '" >Click Here to Obtain User Consent</a>', $baseUrl, $redirectUrl);
