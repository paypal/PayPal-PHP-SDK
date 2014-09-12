<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class Links
 *
 * @property string                  href
 * @property string                  rel
 * @property \PayPal\Api\HyperSchema targetSchema
 * @property string                  method
 * @property string                  enctype
 * @property \PayPal\Api\HyperSchema schema
 */
class Links extends PPModel
{
    /**
     * Set Href
     *
     * @param string $href
     *
     * @return $this
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get Href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set Rel
     *
     * @param string $rel
     *
     * @return $this
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * Get Rel
     *
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set Target Schema
     *
     * @param \PayPal\Api\HyperSchema $targetSchema
     *
     * @return $this
     */
    public function setTargetSchema($targetSchema)
    {
        $this->targetSchema = $targetSchema;

        return $this;
    }

    /**
     * Get Target Schema
     *
     * @return \PayPal\Api\HyperSchema
     */
    public function getTargetSchema()
    {
        return $this->targetSchema;
    }

    /**
     * Set Method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get Method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set Enctype
     *
     * @param string $enctype
     *
     * @return $this
     */
    public function setEnctype($enctype)
    {
        $this->enctype = $enctype;

        return $this;
    }

    /**
     * Get Enctype
     *
     * @return string
     */
    public function getEnctype()
    {
        return $this->enctype;
    }

    /**
     * Set Schema
     *
     * @param \PayPal\Api\HyperSchema $schema
     *
     * @return $this
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * Get Schema
     *
     * @return \PayPal\Api\HyperSchema
     */
    public function getSchema()
    {
        return $this->schema;
    }
}
