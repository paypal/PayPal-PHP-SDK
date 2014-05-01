<?php

namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

/**
 * Class HyperSchema
 *
 * @property \PayPal\Api\Links links
 * @property string            fragmentResolution
 * @property bool              readonly
 * @property string            contentEncoding
 * @property string            pathStart
 * @property string            mediaType
 */
class HyperSchema extends PPModel
{
    /**
     * Set Links
     *
     * @param \PayPal\Api\Links $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Get Links
     *
     * @return \PayPal\Api\Links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set Fragment Resolution
     *
     * @param string $fragmentResolution
     *
     * @return $this
     */
    public function setFragmentResolution($fragmentResolution)
    {
        $this->fragmentResolution = $fragmentResolution;

        return $this;
    }

    /**
     * Get Fragment Resolution
     *
     * @return string
     */
    public function getFragmentResolution()
    {
        return $this->fragmentResolution;
    }

    /**
     * Set Read Only
     *
     * @param bool $readonly
     *
     * @return $this
     */
    public function setReadonly($readonly)
    {
        $this->readonly = $readonly;

        return $this;
    }

    /**
     * Get Read Only
     *
     * @return bool
     */
    public function getReadonly()
    {
        return $this->readonly;
    }

    /**
     * Set Content Encoding
     *
     * @param string $contentEncoding
     *
     * @return $this
     */
    public function setContentEncoding($contentEncoding)
    {
        $this->contentEncoding = $contentEncoding;

        return $this;
    }

    /**
     * Get Content Encoding
     *
     * @return string
     */
    public function getContentEncoding()
    {
        return $this->contentEncoding;
    }

    /**
     * Set Path Start
     *
     * @param string $pathStart
     *
     * @return $this
     */
    public function setPathStart($pathStart)
    {
        $this->pathStart = $pathStart;

        return $this;
    }

    /**
     * Get Path Start
     *
     * @return string
     */
    public function getPathStart()
    {
        return $this->pathStart;
    }

    /**
     * Set Media Type
     *
     * @param string $mediaType
     *
     * @return $this
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * Get Media Type
     *
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }
}
