<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;

/**
 * Class Presentation
 *
 * Parameters for style and presentation.
 *
 * @package PayPal\Api
 *
 * @property string brand_name
 * @property string logo_image
 * @property string locale_code
 */
class Presentation extends PPModel
{
    /**
     * A label that overrides the business name in the PayPal account on the PayPal pages.
     * 
     *
     * @param string $brand_name
     * 
     * @return $this
     */
    public function setBrandName($brand_name)
    {
        $this->brand_name = $brand_name;
        return $this;
    }

    /**
     * A label that overrides the business name in the PayPal account on the PayPal pages.
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brand_name;
    }

    /**
     * A label that overrides the business name in the PayPal account on the PayPal pages.
     *
     * @deprecated Instead use setBrandName
     *
     * @param string $brand_name
     * @return $this
     */
    public function setBrand_name($brand_name)
    {
        $this->brand_name = $brand_name;
        return $this;
    }

    /**
     * A label that overrides the business name in the PayPal account on the PayPal pages.
     * @deprecated Instead use getBrandName
     *
     * @return string
     */
    public function getBrand_name()
    {
        return $this->brand_name;
    }

    /**
     * A URL to logo image. Allowed vaues: `.gif`, `.jpg`, or `.png`.
     * 
     *
     * @param string $logo_image
     * 
     * @return $this
     */
    public function setLogoImage($logo_image)
    {
        $this->logo_image = $logo_image;
        return $this;
    }

    /**
     * A URL to logo image. Allowed vaues: `.gif`, `.jpg`, or `.png`.
     *
     * @return string
     */
    public function getLogoImage()
    {
        return $this->logo_image;
    }

    /**
     * A URL to logo image. Allowed vaues: `.gif`, `.jpg`, or `.png`.
     *
     * @deprecated Instead use setLogoImage
     *
     * @param string $logo_image
     * @return $this
     */
    public function setLogo_image($logo_image)
    {
        $this->logo_image = $logo_image;
        return $this;
    }

    /**
     * A URL to logo image. Allowed vaues: `.gif`, `.jpg`, or `.png`.
     * @deprecated Instead use getLogoImage
     *
     * @return string
     */
    public function getLogo_image()
    {
        return $this->logo_image;
    }

    /**
     * Locale of pages displayed by PayPal payment experience.
     * 
     *
     * @param string $locale_code
     * 
     * @return $this
     */
    public function setLocaleCode($locale_code)
    {
        $this->locale_code = $locale_code;
        return $this;
    }

    /**
     * Locale of pages displayed by PayPal payment experience.
     *
     * @return string
     */
    public function getLocaleCode()
    {
        return $this->locale_code;
    }

    /**
     * Locale of pages displayed by PayPal payment experience.
     *
     * @deprecated Instead use setLocaleCode
     *
     * @param string $locale_code
     * @return $this
     */
    public function setLocale_code($locale_code)
    {
        $this->locale_code = $locale_code;
        return $this;
    }

    /**
     * Locale of pages displayed by PayPal payment experience.
     * @deprecated Instead use getLocaleCode
     *
     * @return string
     */
    public function getLocale_code()
    {
        return $this->locale_code;
    }

}
