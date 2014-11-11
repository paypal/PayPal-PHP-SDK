<?php

// ### Obtain Access Token From Refresh Token
require __DIR__ . '/../bootstrap.php';

use PayPal\Auth\Openid\PPOpenIdUserinfo;
use PayPal\Auth\Openid\PPOpenIdTokeninfo;

// To obtain User Info, you have to follow three steps in general.
// First, you need to obtain user's consent to retrieve the information you want.
// This is explained in the example "ObtainUserConsent.php".

// Once you get the user's consent, the end result would be long lived refresh token.
// This refresh token should be stored in a permanent storage for later use.

// Lastly, when you need to retrieve the user information, you need to generate the short lived access token
// to retreive the information. The short lived access token can be retrieved using the example shown in
// "GenerateAccessTokenFromRefreshToken.php", or as shown below

// You can retrieve the refresh token by executing ObtainUserConsent.php and store the refresh token
$refreshToken = 'yzX4AkmMyBKR4on7vB5he-tDu38s24Zy-kTibhSuqA8kTdy0Yinxj7NpAyULx0bxqC5G8dbXOt0aVMlMmtpiVmSzhcjVZhYDM7WUQLC9KpaXGBHyltJPkLLQkXE';

try {

    $tokenInfo = new PPOpenIdTokeninfo();
    $tokenInfo = $tokenInfo->createFromRefreshToken(array('refresh_token' => $refreshToken), $apiContext);

    $params = array('access_token' => $tokenInfo->getAccessToken());
    $userInfo = PPOpenIdUserinfo::getUserinfo($params, $apiContext);

} catch (Exception $ex) {
    ResultPrinter::printError("User Information", "User Info", null, $params, $ex);
    exit(1);
}

ResultPrinter::printResult("User Information", "User Info", $userInfo->getUserId(), $params, $userInfo);
