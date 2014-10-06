<?php
namespace PayPal\Api;

use PayPal\Common\PPModel;
use PayPal\Rest\ApiContext;

class InvoicingMetaData extends PPModel
{
    /**
     * Date when the resource was created.
     *
     * @param string $created_date
     */
    public function setCreatedDate($created_date)
    {
        $this->created_date = $created_date;
        return $this;
    }

    /**
     * Date when the resource was created.
     *
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Date when the resource was created.
     *
     * @param string $created_date
     * @deprecated. Instead use setCreatedDate
     */
    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
        return $this;
    }

    /**
     * Date when the resource was created.
     *
     * @return string
     * @deprecated. Instead use getCreatedDate
     */
    public function getCreated_date()
    {
        return $this->created_date;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @param string $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @param string $created_by
     * @deprecated. Instead use setCreatedBy
     */
    public function setCreated_by($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * Email address of the account that created the resource.
     *
     * @return string
     * @deprecated. Instead use getCreatedBy
     */
    public function getCreated_by()
    {
        return $this->created_by;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @param string $cancelled_date
     */
    public function setCancelledDate($cancelled_date)
    {
        $this->cancelled_date = $cancelled_date;
        return $this;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @return string
     */
    public function getCancelledDate()
    {
        return $this->cancelled_date;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @param string $cancelled_date
     * @deprecated. Instead use setCancelledDate
     */
    public function setCancelled_date($cancelled_date)
    {
        $this->cancelled_date = $cancelled_date;
        return $this;
    }

    /**
     * Date when the resource was cancelled.
     *
     * @return string
     * @deprecated. Instead use getCancelledDate
     */
    public function getCancelled_date()
    {
        return $this->cancelled_date;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @param string $cancelled_by
     */
    public function setCancelledBy($cancelled_by)
    {
        $this->cancelled_by = $cancelled_by;
        return $this;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @return string
     */
    public function getCancelledBy()
    {
        return $this->cancelled_by;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @param string $cancelled_by
     * @deprecated. Instead use setCancelledBy
     */
    public function setCancelled_by($cancelled_by)
    {
        $this->cancelled_by = $cancelled_by;
        return $this;
    }

    /**
     * Actor who cancelled the resource.
     *
     * @return string
     * @deprecated. Instead use getCancelledBy
     */
    public function getCancelled_by()
    {
        return $this->cancelled_by;
    }

    /**
     * Date when the resource was last edited.
     *
     * @param string $last_updated_date
     */
    public function setLastUpdatedDate($last_updated_date)
    {
        $this->last_updated_date = $last_updated_date;
        return $this;
    }

    /**
     * Date when the resource was last edited.
     *
     * @return string
     */
    public function getLastUpdatedDate()
    {
        return $this->last_updated_date;
    }

    /**
     * Date when the resource was last edited.
     *
     * @param string $last_updated_date
     * @deprecated. Instead use setLastUpdatedDate
     */
    public function setLast_updated_date($last_updated_date)
    {
        $this->last_updated_date = $last_updated_date;
        return $this;
    }

    /**
     * Date when the resource was last edited.
     *
     * @return string
     * @deprecated. Instead use getLastUpdatedDate
     */
    public function getLast_updated_date()
    {
        return $this->last_updated_date;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @param string $last_updated_by
     */
    public function setLastUpdatedBy($last_updated_by)
    {
        $this->last_updated_by = $last_updated_by;
        return $this;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @return string
     */
    public function getLastUpdatedBy()
    {
        return $this->last_updated_by;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @param string $last_updated_by
     * @deprecated. Instead use setLastUpdatedBy
     */
    public function setLast_updated_by($last_updated_by)
    {
        $this->last_updated_by = $last_updated_by;
        return $this;
    }

    /**
     * Email address of the account that last edited the resource.
     *
     * @return string
     * @deprecated. Instead use getLastUpdatedBy
     */
    public function getLast_updated_by()
    {
        return $this->last_updated_by;
    }

    /**
     * Date when the resource was first sent.
     *
     * @param string $first_sent_date
     */
    public function setFirstSentDate($first_sent_date)
    {
        $this->first_sent_date = $first_sent_date;
        return $this;
    }

    /**
     * Date when the resource was first sent.
     *
     * @return string
     */
    public function getFirstSentDate()
    {
        return $this->first_sent_date;
    }

    /**
     * Date when the resource was first sent.
     *
     * @param string $first_sent_date
     * @deprecated. Instead use setFirstSentDate
     */
    public function setFirst_sent_date($first_sent_date)
    {
        $this->first_sent_date = $first_sent_date;
        return $this;
    }

    /**
     * Date when the resource was first sent.
     *
     * @return string
     * @deprecated. Instead use getFirstSentDate
     */
    public function getFirst_sent_date()
    {
        return $this->first_sent_date;
    }

    /**
     * Date when the resource was last sent.
     *
     * @param string $last_sent_date
     */
    public function setLastSentDate($last_sent_date)
    {
        $this->last_sent_date = $last_sent_date;
        return $this;
    }

    /**
     * Date when the resource was last sent.
     *
     * @return string
     */
    public function getLastSentDate()
    {
        return $this->last_sent_date;
    }

    /**
     * Date when the resource was last sent.
     *
     * @param string $last_sent_date
     * @deprecated. Instead use setLastSentDate
     */
    public function setLast_sent_date($last_sent_date)
    {
        $this->last_sent_date = $last_sent_date;
        return $this;
    }

    /**
     * Date when the resource was last sent.
     *
     * @return string
     * @deprecated. Instead use getLastSentDate
     */
    public function getLast_sent_date()
    {
        return $this->last_sent_date;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @param string $last_sent_by
     */
    public function setLastSentBy($last_sent_by)
    {
        $this->last_sent_by = $last_sent_by;
        return $this;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @return string
     */
    public function getLastSentBy()
    {
        return $this->last_sent_by;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @param string $last_sent_by
     * @deprecated. Instead use setLastSentBy
     */
    public function setLast_sent_by($last_sent_by)
    {
        $this->last_sent_by = $last_sent_by;
        return $this;
    }

    /**
     * Email address of the account that last sent the resource.
     *
     * @return string
     * @deprecated. Instead use getLastSentBy
     */
    public function getLast_sent_by()
    {
        return $this->last_sent_by;
    }

}
