<?php

// This class was generated on Tue, 30 Jan 2018 15:44:51 CST by version 0.1.0-dev+dcaee0 of Braintree SDK Generator
// SimulateEventRequest.php
// @version 0.1.0-dev+dcaee0
// @type request
// @data H4sIAAAAAAAC/8yX0W/bthPH339/xYG/PSSALKXLkrV+C5oUydY1WezuJQjis3S2WEukRp7ieEX+94GipEZSjWRomu3J8JGSvh9+yePdZ/EBcxJjYWVeZsgU0i0pFoE4JhsbWbDUSozFpB62gLCmear1CqqZIZwp4JTgl8n5BzD0Z0mWYa6TTQC2oFguNoBgMS8yggI3mcYkFIH4vSSzuUCDOTEZK8ZX14E4JUzI9KPvtMn7sQvktB+79B+fbgoS48/C/7bK4aQG+wONxHlGPfBRA/4rbbYNbV+TXMer3sKIQBwZgxuvY8/pw+RcZRsxXmBmyQuWhpI2cGF0QYYlOaKWwLKRajlUXn3mht2kh6o74a7iaUpeHCjMKYRJbZBWBHpR2WjLuXtiTomfaUN4pw0QxmnjbgCF0bcyIdAq8w//c2I2ZQ9YlVl2HzxKXZqsg+v/Dzk/Xr6HhTYVVGuMSgotq027AJ1LZkqCzoyzY5C2AnUyv9XDJyLVH7+RSYesEx4Cnh03ntUTh1RuDZ4b5/rezbKFVpZ6R23LCetADVCOuscGlGa5kDG64e9/hmJDyHTDMu8eom58uPiJyyioEnAzYJ2S6m60AQqs0YJ/axKAVHB1ppiMIu69a6FNjny9kzIXdhxFrHVmQ0m8CLVZRinnWWQW8f7+/pv/W4rdu0cH4eHuC+3Vb0k6nCIDG7lckqHkkQV7UZ5bMtapHSJ9GdlGVc9wnj4k+hdYevnjqXnj+y/+e6lW8EAJnM8/UfyVVJFJtbIdiCbSSxoK0MlzJPWtNDLkLuMErk6PpifnRxOoHr3eiRId2wgLGaXIpNGOqoH+gTl8/uSSGlp0YOrA0JNYu/qICRjNktgl7hCmGnJcUWVVAxdjlgVu+lwqP5ITpzqBteQUOJW2wvYZ5uPlGTDlRVX+PDGvHB78vLfriro4KxP/hdkPswBmO7OgSlKz3RnEKRqMXeVVXbGFoVFhdEzWSrUMwRHNHOvM3T7uFSvaQGOLY9WqzQeVGYDtEnhGz4NVOeL8VVyFX+gg+TXtWNeGhuadTqcXjQ3NVQu8xbwXIjDUrZL8/6H2K7f8XqA7ly6BP7pFDt68ft1ePT/tBrBOZZyCJXPramELqFyScTsDK3u90aXCfC6XpS5ttoGEfJnp94elHBXL2DapyT0WwoQIrqrkcVkrtF/UrdfrUKLCShtaK5cqdwVr5J4dNUj9v+Gdw9h9rlKoNUJvyWiGrC5NTD032uDQkmbwP3ldNuKGFUB/ZAjmeo7G3xayORust96ez9NPPRHQlnmOZtPtA9tYv3StR+rd7O+2pun4ike+lbqrmuEAZkeuIXZ7FrDkVBv516BUDGfPVbO/1YpJ1d2xwKLIalXRJ1vVN6fMxW8+y43FxflkKnybLcYiun0VPQSx0aA1PrkrKGZKJoxc2rc6ITH+ce/V/f/+BgAA//8=
// DO NOT EDIT

namespace PayPal\v1\Webhooks;

use BraintreeHttp\HttpRequest;class SimulateEventRequest extends HttpRequest 
{
    function __construct()
    {
        parent::__construct("/v1/notifications/simulate-event?", "POST");
        $this->headers["Content-Type"] = "application/json";
    }

    
}
