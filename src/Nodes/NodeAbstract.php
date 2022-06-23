<?php

namespace ShopeePhp\Nodes;

use Psr\Http\Message\UriInterface;
use ShopeePhp\Client;
use ShopeePhp\CommonParameters;
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
     * @param array|CommonParameters $parameters
     * @param array|RequestParameters $parameters
     * @return ResponseData
     */
    public function post($uri, $requestParameters, $commonParameters)
    {
        if ($requestParameters instanceof RequestParametersInterface) {
            $requestParameters = $requestParameters->toArray();
        }

        if ($commonParameters instanceof RequestParametersInterface) {
            $commonParameters = $commonParameters->toArray();
        }

        $request = $this->client->request('POST', $uri, $requestParameters, $commonParameters);
        $response = $this->client->send($request);

        return new ResponseData($response);
    }

    /**
     * @param string|UriInterface $uri
     * @param array|CommonParameters $commonParameters
     * @param array|RequestParameters $requestParameters
     * @return ResponseData
     */
    public function get($uri, $commonParameters, $requestParameters)
    {

        if ($requestParameters instanceof RequestParametersInterface) {
            $requestParameters = $requestParameters->toArray();
        }

        if ($commonParameters instanceof RequestParametersInterface) {
            $commonParameters = $commonParameters->toArray();
        }

        $parameters = array_merge($requestParameters, $commonParameters);
        $request = $this->client->request('GET', $uri, $parameters);
        $response = $this->client->send($request);

        return new ResponseData($response);
    }
}
