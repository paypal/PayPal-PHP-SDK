<?php

namespace PayPal\Test\Functional;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Core\PayPalConfigManager;
use PayPal\Core\PayPalCredentialManager;
use PayPal\Rest\ApiContext;

class Setup
{

    public static $mode = 'mock';

    public static function SetUpForFunctionalTests(\PHPUnit_Framework_TestCase &$test)
    {
        $context = new ApiContext();
        $context->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'warning'
        ));

        PayPalCredentialManager::getInstance()->setCredentialObject(PayPalCredentialManager::getInstance()->getCredentialObject('acct1'));

        self::$mode = getenv('REST_MODE') ? getenv('REST_MODE') : 'mock';
        if (self::$mode != 'sandbox') {

            // Mock PayPalRest Caller if mode set to mock
            $test->mockPayPalRestCall = $test->getMockBuilder('\PayPal\Transport\PayPalRestCall')
                ->disableOriginalConstructor()
                ->getMock();

            $test->mockPayPalRestCall->expects($test->any())
                ->method('execute')
                ->will($test->returnValue(
                    $test->response
                ));
        }
    }
}
