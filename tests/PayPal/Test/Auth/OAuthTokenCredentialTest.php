<?php

// namespace PayPal\Test\Common;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Test\Constants;
use PayPal\Core\PayPalConfigManager;
use PayPal\Exception\PayPalConnectionException;

class OAuthTokenCredentialTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group integration
     */
    public function testGetAccessToken()
    {
        $cred = new OAuthTokenCredential(Constants::CLIENT_ID, Constants::CLIENT_SECRET);
        $config = PayPalConfigManager::getInstance()->getConfigHashmap();
        $token = $cred->getAccessToken($config);
        $this->assertNotNull($token);

        // Check that we get the same token when issuing a new call before token expiry
        $newToken = $cred->getAccessToken($config);
        $this->assertNotNull($newToken);
        $this->assertEquals($token, $newToken);
    }

    /**
     * @group integration
     */
    public function testInvalidCredentials()
    {
        $this->setExpectedException('PayPal\Exception\PayPalConnectionException');
        $cred = new OAuthTokenCredential('dummy', 'secret');
        $this->assertNull($cred->getAccessToken(PayPalConfigManager::getInstance()->getConfigHashmap()));
    }
}
