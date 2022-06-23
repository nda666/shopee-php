<?php

namespace ShopeePhp;

use Psr\Http\Message\ResponseInterface;

use function json_decode;

class ResponseData
{
    /** @var ResponseInterface */
    private $response;

    /** @var object */
    private $data;

    public function __construct(ResponseInterface $response)
    {
        $json = $response->getBody()->getContents();
        $data = json_decode($json);

        $this->response = $response;
        $this->data = $data;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getData(): object
    {
        return $this->data;
    }
}
