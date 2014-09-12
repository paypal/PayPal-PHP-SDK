<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Address
 *
 * @property string line1
 * @property string line2
 * @property string city
 * @property string country_code
 * @property string postal_code
 * @property string state
 * @property string phone
 */
class Address extends PPModel
{
    /**
     * Set Line 1
     * Address (eg. number, street, etc)
     *
     * @param string $line1
     *
     * @return $this
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get Line 1
     * Address (eg. number, street, etc)
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set Line 2 (Optional)
     * Address (eg. suite, apt #, etc)
     *
     * @param string $line2
     *
     * @return $this
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get Line 2 (Optional)
     * Address (eg. suite, apt #, etc)
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set City Name
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get City Name
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set Country Code
     * Two Letter
     *
     * @param string $country_code
     *
     * @return $this
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Get Country Code
     * Two Letter
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * Set Country Code
     * Two Letter
     *
     * @param string $country_code
     *
     * @deprecated Use setCountryCode
     *
     * @return $this
     */
    public function setCountry_code($country_code)
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Get Country Code
     * Two Letter
     *
     * @deprecated Use getCountryCode
     *
     * @return string
     */
    public function getCountry_code()
    {
        return $this->country_code;
    }

    /**
     * Set Postal Code
     * Zip code or equivalent is usually required for countries that have them
     * For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code
     *
     * @param string $postal_code
     *
     * @return $this
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * Get Postal Code
     * Zip code or equivalent is usually required for countries that have them
     * For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set Postal Code
     * Zip code or equivalent is usually required for countries that have them
     * For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code
     *
     * @param string $postal_code
     *
     * @deprecated Use setPostalCode
     *
     * @return $this
     */
    public function setPostal_code($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * Get Postal Code
     * Zip code or equivalent is usually required for countries that have them
     * For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code
     *
     * @deprecated Use getPostalCode
     *
     * @return string
     */
    public function getPostal_code()
    {
        return $this->postal_code;
    }

    /**
     * Set State
     * Two Letter Code for US States and the equivalent for other countries
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get State
     * Two Letter Code for US States and the equivalent for other countries
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set Phone Number
     * E.123 format
     *
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get Phone Number
     * E.123 format
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
