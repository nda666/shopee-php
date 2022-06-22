<?php

namespace ShopeePhp\Nodes\Product;

use ShopeePhp\CommonParameters;
use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Product extends NodeAbstract
{

    /**
     * Use this call to get a list of category.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetCategory $parameters
     * @return ResponseData
     */
    public function get_category($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_category', $commonParameters, $requestParameters ? $requestParameters : [
            'offset' => 1,
            'page_size' => 100
        ]);
    }

    /**
     * Use this call to get a list of items.
     *
     * param array|CommonParameters $commonParameters
     * @param array|Parameters\GetItemsList $requestParameters
     * @return ResponseData
     */
    public function getItemsList($commonParameters = [], $requestParameters = []): ResponseData
    {

        return $this->get('/api/v2/product/get_item_list', $commonParameters, $requestParameters ? $requestParameters : [
            'offset' => 1,
            'page_size' => 100
        ]);
    }

    /**
     * Use this call to get items base info
     *
     * param array|CommonParameters $commonParameters
     * @param array|Parameters\GetItemsList $requestParameters
     * @return ResponseData
     */
    public function getItemsBaseInfo($commonParameters = [],$requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_item_base_info', $commonParameters, $requestParameters);
    }
}
