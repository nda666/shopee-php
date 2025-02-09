<?php

namespace ShopeePhp\Tests;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use InvalidArgumentException;
use Psr\Http\Message\UriInterface;
use ShopeePhp\Client;
use PHPUnit\Framework\TestCase;
use ShopeePhp\Exception\Api\ApiException;
use ShopeePhp\Exception\Api\BadRequestException;
use ShopeePhp\Exception\Api\ClientException;
use ShopeePhp\Exception\Api\ServerException;
use ShopeePhp\SignatureGenerator;
use ShopeePhp\SignatureGeneratorInterface;
use stdClass;

class ClientTest extends TestCase
{
    use ClientTrait;

    public function testCreateClient()
    {
        $client = $this->createClient();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(ClientInterface::class, $client->getHttpClient());
        $this->assertInstanceOf(UriInterface::class, $client->getBaseUrl());
        $this->assertEquals(Client::DEFAULT_BASE_URL, $client->getBaseUrl()->__toString());
        $this->assertEquals(Client::DEFAULT_USER_AGENT, $client->getUserAgent());
    }

    public function testCreateClientWithConfig()
    {
        $config = [
            'httpClient' => new HttpClient(['ping' => 'pong']),
            'baseUrl' => 'https://galaxy.com/',
            'userAgent' => 'HeartOfGold/Prototype',
        ];

        $client = $this->createClient($config);

        $this->assertInstanceOf(ClientInterface::class, $client->getHttpClient());
        $this->assertEquals('pong', $client->getHttpClient()->getConfig('ping'));
        $this->assertInstanceOf(UriInterface::class, $client->getBaseUrl());
        $this->assertEquals($config['baseUrl'], $client->getBaseUrl()->__toString());
        $this->assertEquals($config['userAgent'], $client->getUserAgent());
    }

    public function testCreateClientWithInvalidSignatureGenerator()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->createClient([
            SignatureGeneratorInterface::class => new stdClass(),
        ]);
    }

    public function testShouldBeOkWhenRequestWithCustomSignatureGenerator()
    {
        $signatureGenerator = new class ('PARTNER_KEY') extends SignatureGenerator {
            public function generateSignature(
                string $partnerId,
                string $url,
                $timestamp = null,
                string $access_token = null,
                $shop_id = null,
            ): string {
                return 'CUSTOM_SIGNATURE';
            }
        };

        $actual = $this->createClient([
            SignatureGeneratorInterface::class => $signatureGenerator,
        ])->request('GET', '/api/v2/orders/detail');

        $parseQuery = [];
        $parseQuery['sign'] = "";
        parse_str($actual->getUri('Authorization')->getQuery(), $parseQuery);
        $this->assertEquals('CUSTOM_SIGNATURE', $parseQuery['sign']);
    }

    public function testShouldBeOkWhenNewRequest()
    {
        $uri = Utils::uriFor(Client::DEFAULT_BASE_URL . '/api/v2/orders/detail?partner_id=1&timestamp=123123123&sign=xxxxxxxxxx');
        $expected = new Request(
            'POST',
            $uri,
            [
                'User-Agent' => Client::DEFAULT_USER_AGENT,
                'Content-Type' => 'application/json',
            ],
            '{"ordersn":160726152598865}',
        );

        $actual = $this->createClient()->request(
            'POST',
            '/api/v2/orders/detail',
            [
                'sign' => "xxxxxxxxxx",
                'partner_id' => 1,
                'timestamp' => 123123123,
            ],
            [
                'ordersn' => 160726152598865,
            ],
        );

        $this->assertEquals($expected->getMethod(), $actual->getMethod());
        $this->assertEquals($expected->getUri(), $actual->getUri());
        $this->assertEquals($expected->getHeaders(), $actual->getHeaders());
        $this->assertEquals($expected->getBody()->getContents(), $actual->getBody()->getContents());
        $this->assertEquals($expected->getProtocolVersion(), $actual->getProtocolVersion());
    }

    public function getRequestUriCases()
    {
        return [
            [
                'https://galaxy.com/',
                'milky-way/?partner_id=xxxxx&timestamp=xxxx&sign=xxxxx',
                'https://galaxy.com/milky-way/?partner_id=xxxxx&timestamp=xxxx&sign=xxxxx',
            ],
            [
                'https://galaxy.com/',
                'milky-way/solar-system?partner_id=1&timestamp=1655892524&sign=ce487eda966edbf656072dfb6b3268edc8842ba3c19f297399902321f346a946',
                'https://galaxy.com/milky-way/solar-system?partner_id=1&timestamp=1655892524&sign=ce487eda966edbf656072dfb6b3268edc8842ba3c19f297399902321f346a946',
            ],
        ];
    }

    /**
     * @dataProvider getRequestUriCases
     * @param string $baseUri
     * @param string $actualUri
     * @param string $exceptedUri
     * @throws \Exception
     */
    public function testShouldBeOkWhenNewRequestWithUri(string $baseUri, string $actualUri, string $exceptedUri)
    {
        $client = $this->createClient([
            'baseUrl' => $baseUri,
        ]);

        $expected = Utils::uriFor($exceptedUri);
        $actual = $client->request("GET", $actualUri)->getUri();

        $this->assertEquals($expected, $actual);
    }

    public function testShouldBeOkWhenSend()
    {
        $expected = new Response(200, [], '"pong"');
        $client = $this->createClient([], $this->createHttpClient($expected));

        $request = $client->request('GET', 'ping');
        $actual = $client->send($request);

        $this->assertEquals($expected, $actual);
    }

    public function getApiExceptionCases()
    {
        return [
            [
                400,
                BadRequestException::class,
            ],
            [
                403,
                ClientException::class,
            ],
            [
                405,
                ClientException::class,
            ],
            [
                500,
                ServerException::class,
            ],
            [
                503,
                ServerException::class,
            ],
        ];
    }

    /**
     * @dataProvider getApiExceptionCases
     * @param int $statusCode
     * @param string $expected
     * @throws \Exception
     */
    public function testThrowExceptionWhenSendIsError(int $statusCode, string $expected)
    {
        try {
            $response = new Response($statusCode);
            $client = $this->createClient();
            $client->setHttpClient($this->createHttpClient($response));

            $request = $client->request('GET', 'ping');
            $client->send($request);
        } catch (ApiException $actual) {
            $this->assertInstanceOf($expected, $actual);
            $this->assertEquals($statusCode, $actual->getCode());
            $this->assertInstanceOf(Request::class, $actual->getRequest());
            $this->assertInstanceOf(Response::class, $actual->getResponse());
            $this->assertEquals([], $actual->getContext());
        }
    }

    public function testThrowExceptionWhenCallNotExistsProperty()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Property "unknown" not exists');

        $client = $this->createClient();
        $client->unknown;
    }
}
