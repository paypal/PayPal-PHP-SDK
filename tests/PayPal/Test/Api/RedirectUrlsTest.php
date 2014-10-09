<?php
namespace PayPal\Test\Api;

use PayPal\Api\RedirectUrls;

class RedirectUrlsTest extends \PHPUnit_Framework_TestCase
{

    public function validRedirectUrlsProvider()
    {
        return array(
            array('https://devtools-paypal.com/guide/pay_paypal/php?success=true', 'https://devtools-paypal.com/guide/pay_paypal/php?cancel=true')
        );
    }

    public function invalidRedirectUrlsProvider()
    {
        return array(
            array('devtools-paypal.com/guide/pay_paypal/php?success=true', 'devtools-paypal.com/guide/pay_paypal/php?cancel=true')
        );
    }

    /**
     * @dataProvider validRedirectUrlsProvider
     */
    public function testValidRedirectUrls($return_url, $cancel_url)
    {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($return_url);
        $redirectUrls->setCancelUrl($cancel_url);

        $this->assertEquals($return_url, $redirectUrls->getReturnUrl());
        $this->assertEquals($cancel_url, $redirectUrls->getCancelUrl());
    }

    /**
     * @dataProvider invalidRedirectUrlsProvider
     */
    public function testInvalidRedirectUrls($return_url, $cancel_url)
    {
        $redirectUrls = new RedirectUrls();
        $this->setExpectedException('\InvalidArgumentException');
        $redirectUrls->setReturnUrl($return_url);
        $redirectUrls->setCancelUrl($cancel_url);
    }

}