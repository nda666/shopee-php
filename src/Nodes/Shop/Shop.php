<?php

namespace ShopeePhp\Nodes\Shop;

use ShopeePhp\CommonParameters;
use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Shop extends NodeAbstract
{

    /**
     * Use this call to get information of shop.
     *
     * @param array|CommonParameters $parameters
     * @param array $parameters
     * @return ResponseData
     */
    public function getShopInfo($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_shop_info', $commonParameters, $requestParameters);
    }

    /**
     * This API support to get information of shop.
     *
     * @param array|CommonParameters $parameters
     * @param array $parameters
     * @return ResponseData
     */
    public function getShopProfile($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_profile', $commonParameters, $requestParameters);
    }

    /**
     * This API support to let sellers to update the shop name, shop logo, and shop description.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\UpdateProfile $parameters
     * @return ResponseData
     */
    public function updateProfile($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/shop/get_profile', $commonParameters, $requestParameters);
    }


    /**
     * For given shop id and region, return warehouse info including warehouse id, address id and location id.
     *
     * @param array|CommonParameters $parameters
     * @param array $parameters
     * @return ResponseData
     */
    public function getWarehouseDetail($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/shop/get_warehouse_detail', $commonParameters, $requestParameters);
    }
    
}
