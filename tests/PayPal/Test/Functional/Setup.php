<?php

namespace PayPal\Test\Functional;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Core\PPCredentialManager;
use PayPal\Rest\ApiContext;

class Setup
{

    public static $mode = 'mock';

    public static function SetUpForFunctionalTests(\PHPUnit_Framework_TestCase &$test)
    {
        $context = new ApiContext();
        $context->setConfig(array(
            'mode' => 'sandbox',
            'acct1.ClientId' => 'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',
            'acct1.ClientSecret' => 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'warning'
        ));
        PPCredentialManager::getInstance()->setCredentialObject(
            new OAuthTokenCredential(
                "AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS",
                "EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL"
            )
        );

        self::$mode = getenv('REST_MODE') ? getenv('REST_MODE') : 'mock';
        if (self::$mode != 'sandbox') {

            // Mock PPRest Caller if mode set to mock
            $test->mockPPRestCall = $test->getMockBuilder('\PayPal\Transport\PPRestCall')
                ->disableOriginalConstructor()
                ->getMock();

            $test->mockPPRestCall->expects($test->any())
                ->method('execute')
                ->will($test->returnValue(
                    $test->response
                ));
        }
    }
}
