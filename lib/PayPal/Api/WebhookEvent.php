<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventList;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

/**
 * Class WebhookEvent
 *
 * Represents a Webhooks event
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string create_time
 * @property string resource_type
 * @property string event_type
 * @property string summary
 * @property mixed resource
 */
class WebhookEvent extends PayPalResourceModel
{
    /**
     * Identifier of the Webhooks event resource.
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
     * Identifier of the Webhooks event resource.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Time the resource was created.
     *
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Name of the resource contained in resource element.
     *
     * @param string $resource_type
     * 
     * @return $this
     */
    public function setResourceType($resource_type)
    {
        $this->resource_type = $resource_type;
        return $this;
    }

    /**
     * Name of the resource contained in resource element.
     *
     * @return string
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * Name of the event type that occurred on resource, identified by data_resource element, to trigger the Webhooks event.
     *
     * @param string $event_type
     * 
     * @return $this
     */
    public function setEventType($event_type)
    {
        $this->event_type = $event_type;
        return $this;
    }

    /**
     * Name of the event type that occurred on resource, identified by data_resource element, to trigger the Webhooks event.
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * A summary description of the event. E.g. A successful payment authorization was created for $$
     *
     * @param string $summary
     * 
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * A summary description of the event. E.g. A successful payment authorization was created for $$
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * This contains the resource that is identified by resource_type element.
     *
     * @param \PayPal\Common\PayPalModel $resource
     * 
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * This contains the resource that is identified by resource_type element.
     *
     * @return \PayPal\Common\PayPalModel
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Retrieves the Webhooks event resource identified by event_id. Can be used to retrieve the payload for an event.
     *
     * @param string $eventId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return WebhookEvent
     */
    public static function get($eventId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($eventId, 'eventId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/notifications/webhooks-events/$eventId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new WebhookEvent();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Resends the Webhooks event resource identified by event_id.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return WebhookEvent
     */
    public function resend($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        $json = self::executeCall(
            "/v1/notifications/webhooks-events/{$this->getId()}/resend",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Retrieves the list of Webhooks events resources for the application associated with token. The developers can use it to see list of past webhooks events.
     *
     * @param array $params
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return WebhookEventList
     */
    public static function all($params, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($params, 'params');
        $payLoad = "";
        $allowedParams = array(
          'page_size' => 1,
          'start_time' => 1,
          'end_time' => 1,
      );
        $json = self::executeCall(
            "/v1/notifications/webhooks-events" . "?" . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new WebhookEventList();
        $ret->fromJson($json);
        return $ret;
    }

}
