<?php

namespace ShopeePhp\Nodes;

use Psr\Http\Message\UriInterface;
use ShopeePhp\Client;
use ShopeePhp\RequestParameters;
use ShopeePhp\RequestParametersInterface;
use ShopeePhp\ResponseData;

abstract class NodeAbstract
{
    /** @var Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string|UriInterface $uri
     * @param array|RequestParameters $parameters
     * @return ResponseData
     */
    public function post($uri, $requestParameters)
    {
        if ($requestParameters instanceof RequestParametersInterface) {
            $requestParameters = $requestParameters->toArray();
        }

        $request = $this->client->request('POST', $uri, [], $requestParameters);
        $response = $this->client->send($request);

        return new ResponseData($response);
    }

    /**
     * @param string|UriInterface $uri
     * @param array|RequestParameters $requestParameters
     * @return ResponseData
     */
    public function get($uri, $requestParameters)
    {

        if ($requestParameters instanceof RequestParametersInterface) {
            $requestParameters = $requestParameters->toArray();
        }

        $request = $this->client->request('GET', $uri, $requestParameters);
        $response = $this->client->send($request);

        return new ResponseData($response);
    }
}
