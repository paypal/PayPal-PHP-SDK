<?php

// This class was generated on Tue, 30 Jan 2018 15:44:51 CST by version 0.1.0-dev+dcaee0 of Braintree SDK Generator
// WebhookListEventSubscriptionsRequest.php
// @version 0.1.0-dev+dcaee0
// @type request
// @data H4sIAAAAAAAC/7yUTW/TQBCG7/yK1Zy3deDAwbeqCbTiK0DEpYqiSTzBC86uuzNusSL/d7S2E7wxUPGhniK/Ga+eZ/zae3iLO4IU7mmdO/f1vDAsK7ojKyuu1rzxphTjLIOGKR0vIYXXhoVVO6miSbV1XqHqD9RqXavr6TloeF+Rr+focUdCniG9WWq4IszIn6YvnN+dZnOUPMr2sKjLwM7ijf0MGj6hN7guKHZamQw0vKK6j0cqi5zU9VS5rZKcDuCtxn1uNrkSp8JaYs1gdOE91h3ERMMHwuydLWpIt1gwheC2Mp4ySMVXpGHuXUleDDGktiqKZtnNEEt3SAhDxKWzTF12tJy1qw4XKux+rPt7yXBPUDzotU/uzyz6YKhx8xO8MVnXJ6lL4ggyzmPeC6swgD3I/PzvmX9VnGxAMuSN8xNelVc7tGeeMAtHqcHwoVot/7+uvG2OftDBhp8hfB+Mq19Zc1v1cCpMPRIhC0oVF+IYjSm7v8ImMe7Df6FdNstGw6WzQrZ/GQHLsjAbDAzJF24f+ZVI+YYkdxmk8HK2gO6zBCkkd08T68Rs+zs46SE52f/4DjVJi3x2qPzsW0kboexjK3fpMoL02WTSPPkOAAD//w==
// DO NOT EDIT

namespace PayPal\v1\Webhooks;

use BraintreeHttp\HttpRequest;class WebhookListEventSubscriptionsRequest extends HttpRequest 
{
    function __construct($webhookId)
    {
        parent::__construct("/v1/notifications/webhooks/{webhook_id}/event-types?", "GET");
        
        $this->path = str_replace("{webhook_id}", urlencode($webhookId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    
}
