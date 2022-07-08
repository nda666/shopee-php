<?php

namespace ShopeePhp\Nodes\Auth;

use ShopeePhp\Nodes\NodeAbstract;
use ShopeePhp\ResponseData;

class Auth extends NodeAbstract
{
    /**
     * Use this call to Get Access Token
     * https://open.shopee.com/documents/v2/OpenAPI%202.0%20Overview?module=87&type=2
     *
     * @param array|Parameters\GetAccessToken $requestParameters
     * @return ResponseData
     */
    public function getAccessToken($requestParameters = []): ResponseData
    {
        return $this->post('api/v2/auth/token/get', $requestParameters);
    }

    /**
     * Use this call to Get RefreshAccessToken.
     * https://open.shopee.com/documents/v2/OpenAPI%202.0%20Overview?module=87&type=2
     *
     * @param array|Parameters\RefreshAccessToken $data
     * @return ResponseData
     */
    public function refreshAccessToken($data = []): ResponseData
    {
        return $this->post('api/v2/auth/access_token/get', $data);
    }
}
