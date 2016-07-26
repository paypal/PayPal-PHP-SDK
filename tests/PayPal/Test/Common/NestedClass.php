<?php
namespace PayPal\Rest\Test\Common;

use PayPal\Rest\Common\PayPalModel;

class NestedClass extends PayPalModel
{

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param \PayPal\Rest\Test\Common\ArrayClass $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     *
     * @return \PayPal\Rest\Test\Common\ArrayClass
     */
    public function getInfo()
    {
        return $this->info;
    }
}
