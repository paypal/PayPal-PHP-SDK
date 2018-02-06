<?php

namespace PayPal\Test\v1\Webhooks;

use PayPal\Test\TestHarness;
use PayPal\v1\Webhooks\WebhookVerifySignatureRequest;
use PHPUnit\Framework\TestCase;

class WebhookVerifySignatureTest extends TestCase
{
    public function testWebhookVerifySignatureRequest()
    {
        $request = new WebhookVerifySignatureRequest();
        $request->body = $this->buildRequestBody();

        $client = TestHarness::client();
        $response = $client->execute($request);
        $this->assertEquals(200, $response->statusCode);
        $this->assertNotNull($response->result);
    }

    private function buildRequestBody()
    {
        return [
            "transmission_id" => "d938e770-8046-11e6-8103-6b62a8a99ac4",
            "transmission_time" => "2016-09-21T22 =>00 =>46Z",
            "cert_url" => "https =>//api.sandbox.paypal.com/v1/notifications/certs/CERT-360caa42-fca2a594-a5cafa77",
            "auth_algo" => "SHA256withRSA",
            "transmission_sig" => "eDOnWUj9FXOnr2naQnrdL7bhgejVSTwRbwbJ0kuk5wAtm2ZYkr7w5BSUDO7e5ZOsqLwN3sPn3RV85Jd9pjHuTlpuXDLYk+l5qiViPbaaC0tLV+8C/zbDjg2WCfvtf2NmFT8CHgPPQAByUqiiTY+RJZPPQC5np7j7WuxcegsJLeWStRAofsDLiSKrzYV3CKZYtNoNnRvYmSFMkYp/5vk4xGcQLeYNV1CC2PyqraZj8HGG6Y+KV4trhreV9VZDn+rPtLDZTbzUohie1LpEy31k2dg+1szpWaGYOz+MRb40U04oD7fD69vghCrDTYs5AsuFM2+WZtsMDmYGI0pxLjn2yw==",
            "webhook_id" => "1JE4291016473214C",
            "webhook_event" => [
                "id" => "WH-9UG43882HX7271132-6E0871324L7949614",
                "event_version" => "1.0",
                "create_time" => "2016-09-21T22 =>00 =>45Z",
                "resource_type" => "sale",
                "event_type" => "PAYMENT.SALE.COMPLETED",
                "summary" => "Payment completed for $ 21.0 USD",
                "resource" => [
                    "id" => "80F85758S3080410K",
                    "state" => "completed",
                    "amount" => [
                        "total" => "21.00",
                        "currency" => "USD",
                        "details" => [
                            "subtotal" => "17.50",
                            "tax" => "1.30",
                            "shipping" => "2.20"
                        ]
                    ],
                    "payment_mode" => "INSTANT_TRANSFER",
                    "protection_eligibility" => "ELIGIBLE",
                    "protection_eligibility_type" => "ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE",
                    "transaction_fee" => [
                        "value" => "0.91",
                        "currency" => "USD"
                    ],
                    "invoice_number" => "57e3028db8d1b",
                    "custom" => "",
                    "parent_payment" => "PAY-7F371669SL612941HK7RQFDQ",
                    "create_time" => "2016-09-21T21 =>59 =>02Z",
                    "update_time" => "2016-09-21T22 =>00 =>06Z",
                    "links" => [
                        ["href" => "https =>//api.sandbox.paypal.com/v1/payments/sale/80F85758S3080410K", "rel" => "self", "method" => "GET"],
                        ["href" => "https =>//api.sandbox.paypal.com/v1/payments/sale/80F85758S3080410K/refund", "rel" => "refund", "method" => "POST"],
                        ["href" => "https =>//api.sandbox.paypal.com/v1/payments/payment/PAY-7F371669SL612941HK7RQFDQ", "rel" => "parent_payment", "method" => "GET"]
                    ]
                ],
                "links" => [
                    ["href" => "https =>//api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-9UG43882HX7271132-6E0871324L7949614", "rel" => "self", "method" => "GET"],
                    ["href" => "https =>//api.sandbox.paypal.com/v1/notifications/webhooks-events/WH-9UG43882HX7271132-6E0871324L7949614/resend", "rel" => "resend", "method" => "POST"]
                ]
            ]
        ];
    }
}
