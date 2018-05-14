<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\UrlValidator;

/**
 * Class SimulateEvent
 *
 * Use a sample payload to simulate a webhook event.
 *
 * @package PayPal\Api
 *
 * @property string webhook_id
 * @property string url
 * @property string event_type
 */
class SimulateEvent extends PayPalResourceModel
{
    /**
     * The ID of the webhook as configured in your Developer Portal account.
     *
     * @param string $webhook_id
     *
     * @return $this
     */
    public function setWebhookId($webhook_id)
    {
        $this->webhook_id = $webhook_id;
        return $this;
    }

    /**
     * The ID of the webhook as configured in your Developer Portal account.
     *
     * @return string
     */
    public function getWebhookId()
    {
        return $this->webhook_id;
    }

    /**
     * The URL that is configured to listen on `localhost` for incoming `POST` notification messages that contain event information.
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
     * The URL that is configured to listen on `localhost` for incoming `POST` notification messages that contain event information.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * The event that triggered the webhook event notification.
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
     * The event that triggered the webhook event notification.
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Simulates a webhook event. A successful call returns a mock [`event`](/docs/api/webhooks/#definition-event) object.
     *
     * @param \PayPal\Rest\ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param \PayPal\Transport\PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return WebhookEvent
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/notifications/simulate-event",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new WebhookEvent();
        $ret->fromJson($json);
        return $ret;
    }
}
