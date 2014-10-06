<?php
use PayPal\Core\PPConfigManager;
/**
 * Test class for PPConfigManager.
 * @preserveGlobalState disabled
 * @runTestsInSeparateProcesses
 */
class PPConfigManagerTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var PPConfigManager
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
        $loader = require dirname(__DIR__) . '/../../../vendor/autoload.php';
        $loader->add('PayPal\\Test', __DIR__);
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
	public function testGetInstance()
	{
        define("PP_CONFIG_PATH", dirname(dirname(dirname(__DIR__))));
        $this->object = PPConfigManager::getInstance();

		$instance = $this->object->getInstance();
        $instance2 = $this->object->getInstance();
		$this->assertTrue($instance instanceof PPConfigManager);
        $this->assertSame($instance, $instance2);
	}

	/**
	 * @test
	 */
	public function testGet()
	{
        define("PP_CONFIG_PATH", dirname(dirname(dirname(__DIR__))));
        $this->object = PPConfigManager::getInstance();
		$ret = $this->object->get('acct2');
        $this->assertConfiguration(['acct2.ClientId' => 'TestClientId', 'acct2.ClientSecret' => 'TestClientSecret'], $ret);
		$this->assertTrue(sizeof($ret) == 2);

	}

	/**
	 * @test
	 */
	public function testGetIniPrefix()
	{
        define("PP_CONFIG_PATH", dirname(dirname(dirname(__DIR__))));
        $this->object = PPConfigManager::getInstance();

		$ret = $this->object->getIniPrefix();
		$this->assertContains('acct1', $ret);
		$this->assertEquals(sizeof($ret), 2);
		
		$ret = $this->object->getIniPrefix('TestClientId');
		$this->assertEquals('acct2', $ret);
	}

	/**
	 * @test
	 */
	public function testConfigByDefault()
    {
        define("PP_CONFIG_PATH", dirname(dirname(dirname(__DIR__))));
        $this->object = PPConfigManager::getInstance();

        // Test file based config params and defaults
        $config = PPConfigManager::getInstance()->getConfigHashmap();
        $this->assertConfiguration(['mode' => 'sandbox', 'http.ConnectionTimeOut' => '60'], $config);
    }

    public function testConfigByCustom()
    {
        define("PP_CONFIG_PATH", dirname(dirname(dirname(__DIR__))));
        $this->object = PPConfigManager::getInstance();

        // Test custom config params and defaults
        $config = PPConfigManager::getInstance()->addConfigs(['mode' => 'custom', 'http.ConnectionTimeOut' => 900])->getConfigHashmap();
        $this->assertConfiguration(['mode' => 'custom', 'http.ConnectionTimeOut' => '900'], $config);
    }

    public function testConfigByFileAndCustom() {
        define("PP_CONFIG_PATH", __DIR__. '/non_existent/');
        $this->object = PPConfigManager::getInstance();

        $config = PPConfigManager::getInstance()->getConfigHashmap();
		$this->assertArrayHasKey('http.ConnectionTimeOut', $config);
		$this->assertEquals('30', $config['http.ConnectionTimeOut']);
        $this->assertEquals('5', $config['http.Retry']);

        //Add more configs
        $config = PPConfigManager::getInstance()->addConfigs(['http.Retry' => "10", 'mode' => 'sandbox'])->getConfigHashmap();
        $this->assertConfiguration(['http.ConnectionTimeOut' => "30", 'http.Retry' => "10", 'mode' => 'sandbox'], $config);
	}

    /**
     * Asserts if each configuration is available and has expected value.
     *
     * @param $conditions
     * @param $config
     */
    public function assertConfiguration($conditions, $config) {
        foreach($conditions as $key => $value) {
            $this->assertArrayHasKey($key, $config);
            $this->assertEquals($value, $config[$key]);
        }
    }
}
?>
