<?php

namespace ShopeePhp\Nodes\Merchant;

use ShopeePhp\CommonParameters;
use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Merchant extends NodeAbstract
{
    /**
     * Use this call to get information of merchant.
     *
     * @param array|CommonParameters $parameters
     * @param array $parameters
     * @return ResponseData
     */
    public function getShopInfo($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_merchant_info', $commonParameters, $requestParameters);
    }

    /**
     * Use this call to get shop_list bound to merchant_id.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetShopProfile $parameters
     * @return ResponseData
     */
    public function getShopListByMerchant($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_shop_list_by_merchant', $commonParameters, $requestParameters);
    }
}
