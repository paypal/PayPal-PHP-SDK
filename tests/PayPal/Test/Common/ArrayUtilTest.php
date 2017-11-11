<?php
namespace PayPal\Test\Common;

use PayPal\Common\ArrayUtil;
use PHPUnit\Framework\TestCase;

class ArrayUtilTest extends TestCase
{

    public function testIsAssocArray()
    {
        $arr = array(1, 2, 3);
        $this->assertEquals(false, ArrayUtil::isAssocArray($arr));

        $arr = array(
            'name' => 'John Doe',
            'City' => 'San Jose'
        );
        $this->assertEquals(true, ArrayUtil::isAssocArray($arr));

        $arr[] = 'CA';
        $this->assertEquals(false, ArrayUtil::isAssocArray($arr));
    }
}
