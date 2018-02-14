<?php

namespace PayPal\Test\Core;

use PayPal\Core\PayPalHttpConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PayPalHttpConfigTest.
 *
 */
class PayPalHttpConfigTest extends TestCase
{

    protected $object;

    private $config = array(
        'http.ConnectionTimeOut' => '30',
        'http.Retry' => '5',
    );

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @test
     */
    public function testHeaderFunctions()
    {
        $o = new PayPalHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'overwritten');

        $this->assertCount(2, $o->getHeaders());
        $this->assertEquals('overwritten', $o->getHeader('key2'));
        $this->assertNull($o->getHeader('key3'));

        $o = new PayPalHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'and more', false);

        $this->assertCount(2, $o->getHeaders());
        $this->assertEquals('value;and more', $o->getHeader('key2'));

        $o->removeHeader('key2');
        $this->assertCount(1, $o->getHeaders());
        $this->assertNull($o->getHeader('key2'));
    }

    /**
     * @test
     */
    public function testCurlOpts()
    {
        $o = new PayPalHttpConfig();
        $o->setCurlOptions(array('k' => 'v'));

        $curlOpts = $o->getCurlOptions();
        $this->assertCount(1, $curlOpts);
        $this->assertEquals('v', $curlOpts['k']);
    }

    public function testRemoveCurlOpts()
    {
        $o = new PayPalHttpConfig();
        $o->setCurlOptions(array('k' => 'v'));
        $curlOpts = $o->getCurlOptions();
        $this->assertCount(1, $curlOpts);
        $this->assertEquals('v', $curlOpts['k']);

        $o->removeCurlOption('k');
        $curlOpts = $o->getCurlOptions();
        $this->assertCount(0, $curlOpts);
    }

    /**
     * @test
     */
    public function testUserAgent()
    {
        $ua = 'UAString';
        $o = new PayPalHttpConfig();
        $o->setUserAgent($ua);

        $curlOpts = $o->getCurlOptions();
        $this->assertEquals($ua, $curlOpts[CURLOPT_USERAGENT]);
    }

    /**
     * @test
     */
    public function testSSLOpts()
    {
        $sslCert = '../cacert.pem';
        $sslPass = 'passPhrase';

        $o = new PayPalHttpConfig();
        $o->setSSLCert($sslCert, $sslPass);

        $curlOpts = $o->getCurlOptions();
        $this->assertArrayHasKey(CURLOPT_SSLCERT, $curlOpts);
        $this->assertEquals($sslPass, $curlOpts[CURLOPT_SSLCERTPASSWD]);
    }

    /**
     * @test
     */
    public function testProxyOpts()
    {
        $proxy = 'http://me:secret@hostname:8081';

        $o = new PayPalHttpConfig();
        $o->setHttpProxy($proxy);

        $curlOpts = $o->getCurlOptions();
        $this->assertEquals('hostname:8081', $curlOpts[CURLOPT_PROXY]);
        $this->assertEquals('me:secret', $curlOpts[CURLOPT_PROXYUSERPWD]);

        $this->setExpectedException('PayPal\Exception\PayPalConfigurationException');
        $o->setHttpProxy('invalid string');
    }
}
