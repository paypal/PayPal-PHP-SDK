<?php

namespace Test\Unit;

use BraintreeHttp\Curl;
use BraintreeHttp\HttpRequest;
use PayPal\Core\AccessToken;
use PayPal\Core\Version;
use PayPal\Core\PayPalHttpClient;
use PayPal\Core\PayPalEnvironment;
use PHPUnit\Framework\TestCase;

class TestEnvironment extends PayPalEnvironment
{
    private $baseUrl;

    public function __construct($clientId, $clientSecret, $baseUrl)
    {
        parent::__construct($clientId, $clientSecret);
        $this->baseUrl = $baseUrl;
    }

    public function baseUrl()
    {
        return $this->baseUrl;
    }
}

class PayPalHttpClientTest extends TestCase
{
    private static function env()
    {
        return new TestEnvironment("clientId", "clientSecret", "http://localhost");
    }

    public function testExecute_addsGzipHeader()
    {
        $req = new HttpRequest("/some-path", "GET");

        $mock = \Mockery::mock(new MockCurl(200))->makePartial();
        $client = new MockPayPalHttpClient(self::env(), $mock);

        $client->execute($req, $mock);

        $mock
            ->shouldHaveReceived('setOpt')
            ->with(CURLOPT_HTTPHEADER, \Mockery::on(function ($argument) use ($client) {
                return "gzip" === $this->deserializeHeaders($argument)['Accept-Encoding'];
            }));
    }

    public function testExecute_fetchesAccessTokenIfNull()
    {
        $req = new HttpRequest("/some-path", "GET");

        $mock = \Mockery::mock(new MockCurl(200))->makePartial();
        $client = new MockPayPalHttpClient(self::env(), $mock);

        $client->execute($req, $mock);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_URL, "http://localhost/v1/oauth2/token"]);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_POSTFIELDS, "grant_type=client_credentials"]);

        $mock
            ->shouldHaveReceived('setOpt')
            ->with(CURLOPT_HTTPHEADER, \Mockery::on(function ($argument) use ($client) {
                $authHeader = self::env()->authorizationString();
                return ("Basic " . $authHeader) === $this->deserializeHeaders($argument)['Authorization'] &&
                "application/x-www-form-urlencoded" === $this->deserializeHeaders($argument)['Content-Type'];
            }));
    }

    public function testExecute_fetchesAccessTokenIfExpired()
    {
        $req = new HttpRequest("/some-path", "GET");

        $mock = \Mockery::mock(new MockCurl(200))->makePartial();
        $client = new MockPayPalHttpClient(self::env(), $mock);

        $accessToken = new AccessToken("sample", "Bearer", 0);

        $this->setAccessToken($client, $accessToken);

        $client->execute($req, $mock);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_URL, "http://localhost/v1/oauth2/token"]);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_POSTFIELDS, "grant_type=client_credentials"]);

        $mock
            ->shouldHaveReceived('setOpt')
            ->with(CURLOPT_HTTPHEADER, \Mockery::on(function ($argument) use ($client) {
                $authHeader = self::env()->authorizationString();
                return ("Basic " . $authHeader) === $this->deserializeHeaders($argument)['Authorization'] &&
                "application/x-www-form-urlencoded" === $this->deserializeHeaders($argument)['Content-Type'];
            }));
    }

    public function testExecute_WithRefreshToken_FetchesAccessTokenWithRefreshToken()
    {
        $req = new HttpRequest("/some-path", "GET");

        $mock = \Mockery::mock(new MockCurl(200))->makePartial();
        $client = new MockPayPalHttpClient(self::env(), $mock, "some-refresh-token");

        $accessToken = new AccessToken("sample", "Bearer", 0);

        $this->setAccessToken($client, $accessToken);

        $client->execute($req, $mock);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_URL, "http://localhost/v1/oauth2/token"]);

        $mock->shouldHaveReceived('setOpt')
            ->withArgs([CURLOPT_POSTFIELDS, "grant_type=client_credentials&refresh_token=some-refresh-token"]);

        $mock
            ->shouldHaveReceived('setOpt')
            ->with(CURLOPT_HTTPHEADER, \Mockery::on(function ($argument) use ($client) {
                $authHeader = self::env()->authorizationString();
                return ("Basic " . $authHeader) === $this->deserializeHeaders($argument)['Authorization'] &&
                "application/x-www-form-urlencoded" === $this->deserializeHeaders($argument)['Content-Type'];
            }));
    }

    public function testExecute_CorrectUserAgentHeader()
    {
        $req = new HttpRequest("/some-path", "GET");

        $mock = \Mockery::mock(new MockCurl(200))->makePartial();
        $client = new MockPayPalHttpClient(self::env(), $mock, "some-refresh-token");

        $accessToken = new AccessToken("sample", "Bearer", 4000);

        $this->setAccessToken($client, $accessToken);

        $client->execute($req);

        $mock
            ->shouldHaveReceived('setOpt')
            ->with(CURLOPT_HTTPHEADER, \Mockery::on(function ($argument) use ($client) {
                $ua = $this->deserializeHeaders($argument)['User-Agent'];

                list($id, $version, $features) = sscanf($ua, "PayPalSDK/%s %s (%[^[]])");
                // Check that we pass the useragent in the expected format

                $this->assertNotNull($id);
                $this->assertNotNull($version);
                $this->assertNotNull($features);
                $this->assertEquals("PayPal-PHP-SDK", $id);
                $this->assertEquals(Version::VERSION, $version);
                $this->assertThat($features, $this->stringContains("os="));
                $this->assertThat($features, $this->stringContains("bit="));
                $this->assertThat($features, $this->stringContains("platform-ver="));
                $this->assertGreaterThan(5, count(explode(';', $features)));

                return !is_null($ua);
            }));
    }

    private function setAccessToken($client, $token)
    {
        $ref = new \ReflectionObject($client);
        $authInjProperty = $ref->getProperty("authInjector");
        $authInjector = $authInjProperty->getValue($client);

        $authRef = new \ReflectionObject($authInjector);
        $accessTokenProperty = $authRef->getProperty("accessToken");
        $accessTokenProperty->setAccessible(true);
        $accessTokenProperty->setValue($authInjector, $token);

        $authInjProperty->setValue($client, $authInjector);
    }

    private function deserializeHeaders($headers)
    {
        $separatedHeaders = [];
        foreach ($headers as $header) {
            if (!empty($header)) {
                list($key, $val) = explode(":", $header);
                $separatedHeaders[$key] = trim($val);
            }
        }
        return $separatedHeaders;
    }
}

class MockPayPalHttpClient extends PayPalHttpClient
{
    private $mockCurl;

    function __construct($environment, MockCurl $curl = NULL, $refreshToken = NULL)
    {
        parent::__construct($environment, $refreshToken);
        $this->mockCurl = $curl;
    }

    public function execute(HttpRequest $request, CURL $curl = NULL)
    {
        return parent::execute($request, $this->mockCurl);
    }
}

class MockCurl extends Curl
{
    protected $statusCode;
    protected $data;
    protected $headers;
    protected $errorCode = 0;
    protected $error;
    protected $reqHeaders;

    public function __construct($statusCode, $data = null, $headers = [], $errorCode = 0, $error = null)
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->headers = $headers;
        $this->errorCode = $errorCode;
        $this->error = $error;
    }

    public function setOpt($option, $value)
    {
        switch ($option) {
            case CURLOPT_HTTPHEADER:
                $this->reqHeaders = $value;
        }
        return $this;
    }

    public function close()
    {
    }

    public function getInfo($option = null)
    {
        if ($option != null) {
            return $this->statusCode;
        }
        return curl_getinfo($this->curl);
    }

    public function exec()
    {
        $response = "HTTP/1.1 " . $this->statusCode . " Status Message\r\n";
        $serializedHeaders = [];
        foreach ($this->headers as $key => $value) {
            $serializedHeaders[] = $key . ":" . $value;
        }
        $response .= implode("\r\n", $serializedHeaders);
        $response .= "\r\n\r\n";
        if (!is_null($this->data)) {
            $response .= $this->data;
        }

        return $response;
    }

    public function errNo()
    {
        return $this->errorCode;
    }

    public function error()
    {
        return $this->error;
    }
}
