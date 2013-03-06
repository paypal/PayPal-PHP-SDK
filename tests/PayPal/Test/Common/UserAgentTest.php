<?php

use PayPal\Common\UserAgent;

class UserAgentTest extends PHPUnit_Framework_TestCase {
	
	public function testGetValue() {
		$ua = UserAgent::getValue();
		list($id, $version, $features) = sscanf($ua, "PayPalSDK/%s %s (%s)");
		
		// Check that we pass the useragent in the expected format
		$this->assertNotNull($id);
		$this->assertNotNull($version);
		$this->assertNotNull($features);
		
		// Check that we pass in these mininal features
		$this->assertThat($features, $this->stringContains("OS="));
		$this->assertThat($features, $this->stringContains("Bit="));
		$this->assertThat($features, $this->stringContains("Lang="));
		$this->assertThat($features, $this->stringContains("V="));
		$this->assertGreaterThan(5, count(explode(';', $features)));
	}
}