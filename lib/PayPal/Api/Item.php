<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;
use PayPal\Validation\UrlValidator;

/**
 * Class Item
 *
 * An item being paid for.
 *
 * @package PayPal\Api
 *
 * @property string quantity
 * @property string name
 * @property string description
 * @property string price
 * @property string tax
 * @property string currency
 * @property string sku
 * @property string url
 * @property string category
 * @property \PayPal\Api\NameValuePair supplementary_data
 * @property \PayPal\Api\NameValuePair postback_data
 */
class Item extends PPModel
{
    /**
     * Number of items.
     * 
     *
     * @param string $quantity
     * 
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Number of items.
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Name of the item.
     * 
     *
     * @param string $name
     * 
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the item.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of the item.
     * 
     *
     * @param string $description
     * 
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of the item.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Cost of the item.
     * 
     *
     * @param string $price
     * 
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Cost of the item.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * tax of the item.
     * 
     *
     * @param string $tax
     * 
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * tax of the item.
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * 3-letter Currency Code
     * 
     *
     * @param string $currency
     * 
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * 3-letter Currency Code
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Number or code to identify the item in your catalog/records.
     * 
     *
     * @param string $sku
     * 
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Number or code to identify the item in your catalog/records.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * URL linking to item information. Available to payer in transaction history.
     * 
     *
     * @param string $url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setUrl($url)
    {
        UrlValidator::validate($url, "Url");
        $this->url = $url;
        return $this;
    }

    /**
     * URL linking to item information. Available to payer in transaction history.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Category type of the item.  This can be either Digital or Physical.
     * 
     *
     * @param string $category
     * 
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Category type of the item.  This can be either Digital or Physical.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     * 
     *
     * @param \PayPal\Api\NameValuePair $supplementary_data
     * 
     * @return $this
     */
    public function setSupplementaryData($supplementary_data)
    {
        $this->supplementary_data = $supplementary_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     *
     * @return \PayPal\Api\NameValuePair[]
     */
    public function getSupplementaryData()
    {
        return $this->supplementary_data;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     *
     * @deprecated Instead use setSupplementaryData
     *
     * @param \PayPal\Api\NameValuePair $supplementary_data
     * @return $this
     */
    public function setSupplementary_data($supplementary_data)
    {
        $this->supplementary_data = $supplementary_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     * @deprecated Instead use getSupplementaryData
     *
     * @return \PayPal\Api\NameValuePair
     */
    public function getSupplementary_data()
    {
        return $this->supplementary_data;
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     * 
     *
     * @param \PayPal\Api\NameValuePair $postback_data
     * 
     * @return $this
     */
    public function setPostbackData($postback_data)
    {
        $this->postback_data = $postback_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     *
     * @return \PayPal\Api\NameValuePair[]
     */
    public function getPostbackData()
    {
        return $this->postback_data;
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     *
     * @deprecated Instead use setPostbackData
     *
     * @param \PayPal\Api\NameValuePair $postback_data
     * @return $this
     */
    public function setPostback_data($postback_data)
    {
        $this->postback_data = $postback_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     * @deprecated Instead use getPostbackData
     *
     * @return \PayPal\Api\NameValuePair
     */
    public function getPostback_data()
    {
        return $this->postback_data;
    }

}
