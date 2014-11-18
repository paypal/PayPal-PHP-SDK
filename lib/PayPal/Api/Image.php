<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class Image
 *
 * @package PayPal\Api
 *
 * @property string image
 */
class Image extends PPModel
{
    /**
     * List of invoices belonging to a merchant.
     *
     * @param string $imageBase64String
     * 
     * @return $this
     */
    public function setImageBase64($imageBase64String)
    {
        $this->image = $imageBase64String;
        return $this;
    }

    /**
     * Get Image as Base-64 encoded String
     *
     * @return string
     */
    public function getImageBase64()
    {
        return $this->image;
    }

    /**
     * Stores the Image to file
     *
     * @param string $name File Name
     */
    public function saveToFile($name = null)
    {
        // Self Generate File Location
        if (!$name) {
            $name = uniqid() . '.png';
        }
        // Save to File
        file_put_contents($name, base64_decode($this->getImageBase64()));
        return $name;
    }

}
