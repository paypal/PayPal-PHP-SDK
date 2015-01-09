<?php

namespace PayPal\Test\Cache;
use PayPal\Cache\AuthorizationCache;

/**
 * Test class for AuthorizationCacheTest.
 *
 */
class AuthorizationCacheTest extends \PHPUnit_Framework_TestCase
{

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

    public static function EnabledProvider()
    {
        return array(
            array(array('cache.enabled' => 'true'), true),
            array(array('cache.enabled' => true), true),
            array(array(), false),
            array(null, false)
        );
    }

    public static function CachePathProvider()
    {
        return array(
            array(array('cache.FileName' => 'temp.cache'), 'temp.cache'),
            array(array(), 'auth.cache'),
            array(null, 'auth.cache')
        );
    }

    /**
     *
     * @dataProvider EnabledProvider
     */
    public function testIsEnabled($config, $expected)
    {
        $result = AuthorizationCache::isEnabled($config);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider CachePathProvider
     */
    public function testCachePath($config, $expected)
    {
        $result = AuthorizationCache::cachePath($config);
        $this->assertContains($expected, $result);
    }

}
