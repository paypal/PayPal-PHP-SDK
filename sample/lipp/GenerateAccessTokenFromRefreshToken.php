<?php

// ### Obtain Access Token From Refresh Token

require __DIR__ . '/../bootstrap.php';
use PayPal\Auth\Openid\PPOpenIdTokeninfo;

// You can retrieve the refresh token by executing ObtainUserConsent.php and store the refresh token
$refreshToken = 'yzX4AkmMyBKR4on7vB5he-tDu38s24Zy-kTibhSuqA8kTdy0Yinxj7NpAyULx0bxqC5G8dbXOt0aVMlMmtpiVmSzhcjVZhYDM7WUQLC9KpaXGBHyltJPkLLQkXE';

try {

    $tokenInfo = new PPOpenIdTokeninfo();
    $tokenInfo = $tokenInfo->createFromRefreshToken(array('refresh_token' => $refreshToken), $apiContext);

} catch (PayPal\Exception\PPConnectionException $ex) {
    echo "Exception: " . $ex->getMessage() . PHP_EOL;
    var_dump($ex->getData());
    exit(1);
}

print_result("Obtained Access Token From Refresh Token", "Access Token", $tokenInfo->getAccessToken(), $tokenInfo);
