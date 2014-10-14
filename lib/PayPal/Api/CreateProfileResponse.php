<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class CreateProfileResponse
 *
 * Response schema for create profile api
 *
 * @package PayPal\Api
 *
 * @property string id
 */
class CreateProfileResponse extends PPModel
{
    /**
     * ID of the payment web experience profile.
     * 
     *
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * ID of the payment web experience profile.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

}
