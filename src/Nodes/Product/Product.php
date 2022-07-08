<?php

namespace ShopeePhp\Nodes\Product;

use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Product extends NodeAbstract
{
    /**
     * Use this call to get a list of category.
     *
     * @param array|Parameters\GetCategory $parameters
     * @return ResponseData
     */
    public function getCategory(
        $requestParameters = []
    ): ResponseData {
        return $this->get('/api/v2/product/get_category', $requestParameters);
    }

    /**
     * Use this call to get a list of items.
     *
     * @param array|Parameters\GetItemsList $requestParameters
     * @return ResponseData
     */
    public function getItemsList(
        $requestParameters = []
    ): ResponseData {

        return $this->get('/api/v2/product/get_item_list', $requestParameters);
    }

    /**
     * Use this call to get items base info
     *
     * @param array|Parameters\GetItemsList $requestParameters
     * @return ResponseData
     */
    public function getItemsBaseInfo($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_base_info', $requestParameters);
    }

    /**
     * Update price.
     *
     * @param array|Parameters\UpdatePrice $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function updatePrice($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_price', $requestParameters);
    }
}
