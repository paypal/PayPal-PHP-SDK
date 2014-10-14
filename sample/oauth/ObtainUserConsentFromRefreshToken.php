<?php

require __DIR__ . '/../bootstrap.php';

// You can retrieve the refresh token by executing ObtainUserConsent.php and store the refresh token
$refreshToken = 'yzX4AkmMyBKR4on7vB5he-tDu38s24Zy-kTibhSuqA8kTdy0Yinxj7NpAyULx0bxqC5G8dbXOt0aVMlMmtpiVmSzhcjVZhYDM7WUQLC9KpaXGBHyltJPkLLQkXE';

$params = array(
    'refresh_token' => $refreshToken,
    'redirect_uri' => getBaseUrl() . '/UserConsentRedirect.php?success=true',
    'client_id' => $clientId,
    'client_secret' => $clientSecret
);
try {
    $tokenInfo = new \PayPal\Auth\Openid\PPOpenIdTokeninfo();
    $tokenInfo = $tokenInfo->createFromRefreshToken($params, $apiContext);
} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

print_result("Obtained Access Token From Refresh Token", "Access Token", $tokenInfo->getAccessToken(), $tokenInfo);
