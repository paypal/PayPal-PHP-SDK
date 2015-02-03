<?php

namespace PayPal\Test\Api;

use PayPal\Api\TransactionFee;

class TransactionFeeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $tfee = new TransactionFee();
        $tfee->setCurrency('AUD');
        $this->assertEquals('AUD', $tfee->getCurrency());

        $tfee->setValue('0.10');
        $this->assertEquals('0.10', $tfee->getValue());
    }
}
