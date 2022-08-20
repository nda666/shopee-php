<?php

namespace ShopeePhp\Tests\Nodes;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ShopeePhp\ResponseData;
use ShopeePhp\Tests\ClientTrait;

use function array_diff_assoc;
use function json_decode;
use function json_encode;
use function ucfirst;

class ProductTest extends TestCase
{
    use ClientTrait;

    public function itemCasesProvider(): array
    {
        return [
            [
                'getBoostedList',
                [
                    'partner_id' => 1234,
                    'timestamp' => '1610000000',
                    'access_token' => 'c09222e3fc40ffb25fc947f738b1abf1',
                    'shop_id' => 600000,
                    'sign' => 'e318d3e932719916a9f9ebb57e2011961bd47abfa54a36e040d050d8931596e2'
                ],
                [
                    'item_id' => 1,
                    'fail_image' => [],
                ],
            ],
        ];
    }

    # Will test while product parameters ready
    /**
     * @dataProvider itemCasesProvider
     * @param string $method
     * @param array $parameters
     * @param array $expectedData
     * @throws \Exception
     */
    public function testShouldBeOkWhenRunGetBoostedItemApis(string $method, array $parameters, array $expectedData)
    {
        $response = new Response(200, [], json_encode($expectedData));
        $history = [];

        $client = $this->createClient([], $this->createHttpClient($response, $history));

        $requestParametersClass = '\\ShopeePhp\\Nodes\\Product\\Parameters\\' . ucfirst($method);
        $requestParameter = new $requestParametersClass($parameters);

        /** @var ResponseData $responseData */
        $responseData = $client->product->$method($requestParameter);


        /** @var Request $request */
        $request = $history[0]['request'];

        parse_str($request->getUri()->getQuery(), $actualParameters);

        $actualParameters = array_diff_assoc($actualParameters, $client->getDefaultParameters());

        $this->assertEquals($parameters, $actualParameters);
        $this->assertEquals(200, $responseData->getResponse()->getStatusCode());
        $this->assertEquals($expectedData, (array) $responseData->getData());
    }
}
