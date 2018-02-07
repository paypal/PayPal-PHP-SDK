<?php

namespace Test\Unit;

use BraintreeHttp\Curl;
use BraintreeHttp\HttpRequest;
use PayPal\Core\AccessToken;
use PayPal\Core\RefreshTokenRequest;
use PayPal\Core\Version;
use PayPal\Core\PayPalHttpClient;
use PayPal\Core\PayPalEnvironment;
use PHPUnit\Framework\TestCase;
use WireMock\Client\WireMock;

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
    private $wireMock;

    public function setUp()
    {
        $this->wireMock = WireMock::create();
        assertThat($this->wireMock->isAlive(), is(true));
    }

    public static function setUpBeforeClass()
    {
        exec('java -jar ./tests/wiremock-standalone.jar > /dev/null 2>&1 &');
    }

    public static function tearDownAfterClass()
    {
        exec('ps aux | grep wiremock | grep -v grep | awk \'{print $2}\' | xargs kill -9');
    }

    private static function env()
    {
        return new TestEnvironment("clientId", "clientSecret", "http://localhost:8080");
    }

    public function testExecute_addsGzipHeader()
    {
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->willReturn(WireMock::aResponse()
                ->withHeader('Content-Type', 'application/json')
                ->withBody(json_encode($this->basicAccessToken()))));

        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
                ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $client = new PayPalHttpClient(self::env());

        $client->execute($req);

        $this->wireMock->verify(WireMock::getRequestedFor(WireMock::urlEqualTo('/some-path'))
            ->withHeader('Accept-Encoding', WireMock::equalTo('gzip')));
    }

    public function testExecute_fetchesAccessTokenIfNull()
    {
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody(json_encode($this->basicAccessToken()))));

        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $client = new PayPalHttpClient(self::env());

        $client->execute($req);

        $authHeader = self::env()->authorizationString();
        $this->wireMock->verify(WireMock::postRequestedFor(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->withHeader('Authorization', WireMock::equalTo('Basic ' . $authHeader))
            ->withRequestBody(WireMock::equalTo("grant_type=client_credentials")));
    }

    public function testExecute_skipsFetchingAccessTokenIfAuthorizationHeaderAlreadyPresent()
    {
        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
                ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $req->headers['Authorization'] = 'custom-header-value';
        $client = new PayPalHttpClient(self::env());

        $client->execute($req);

        $this->wireMock->verify(WireMock::getRequestedFor(WireMock::urlEqualTo('/some-path'))
            ->withHeader('Authorization', WireMock::equalTo('custom-header-value')));
    }

    public function testExecute_fetchesAccessTokenIfExpired()
    {
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody(json_encode($this->basicAccessToken()))));

        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $client = new PayPalHttpClient(self::env());

        $accessToken = new AccessToken("sample", "Bearer", 0);
        $this->setAccessToken($client, $accessToken);

        $client->execute($req);

        $authHeader = self::env()->authorizationString();
        $this->wireMock->verify(WireMock::postRequestedFor(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->withHeader('Authorization', WireMock::equalTo('Basic ' . $authHeader))
            ->withRequestBody(WireMock::equalTo("grant_type=client_credentials")));
    }

    public function testExecute_WithRefreshToken_fetchesAccessTokenWithRefreshToken()
    {
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody(json_encode($this->basicAccessToken()))));

        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $client = new PayPalHttpClient(self::env(), 'some-refresh-token');

        $accessToken = new AccessToken("sample", "Bearer", 0);
        $this->setAccessToken($client, $accessToken);

        $client->execute($req);

        $authHeader = self::env()->authorizationString();
        $this->wireMock->verify(WireMock::postRequestedFor(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->withHeader('Authorization', WireMock::equalTo('Basic ' . $authHeader))
            ->withRequestBody(WireMock::equalTo("grant_type=refresh_token&refresh_token=some-refresh-token")));
    }

    public function testExecute_CorrectUserAgentHeader()
    {
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/oauth2/token'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody(json_encode($this->basicAccessToken()))));

        $this->wireMock->stubFor(WireMock::get(WireMock::urlEqualTo('/some-path'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')));

        $req = new HttpRequest("/some-path", "GET");
        $client = new PayPalHttpClient(self::env());

        $client->execute($req);

        $getReq = WireMock::getRequestedFor(WireMock::urlMatching('/some-path'));
        $reqs = $this->wireMock->findAll($getReq);

        $ua = $reqs[sizeof($reqs)-1]->getHeaders()["User-Agent"];

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
    }

    public function testExecute_withRefreshTokenRequest()
    {
        $refreshTokenResponse = json_encode(["refresh_token" => "some-refresh-token"]);
        $this->wireMock->stubFor(WireMock::post(WireMock::urlEqualTo('/v1/identity/openidconnect/tokenservice'))
            ->willReturn(WireMock::aResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody($refreshTokenResponse)));

        $req = new RefreshTokenRequest(self::env(), "auth-code");
        $client = new PayPalHttpClient(self::env());
        $client->execute($req);

        $authHeader = self::env()->authorizationString();
        $this->wireMock->verify(WireMock::postRequestedFor(WireMock::urlEqualTo('/v1/identity/openidconnect/tokenservice'))
            ->withHeader('Authorization', WireMock::equalTo('Basic ' . $authHeader))
            ->withRequestBody(WireMock::equalTo("grant_type=authorization_code&code=auth-code")));
    }

    private function basicAccessToken($expiresIn = "3600")
    {
        return [
            "access_token" => "sample-access-token",
            "expires_in" => $expiresIn,
            "token_type" => "Bearer",
        ];
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
}
