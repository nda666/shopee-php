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

    /**
     * Update item.
     *
     * @param array $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function updateItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_item', $requestParameters);
    }

    /**
     * Add a new item.
     *
     * @param array $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function addItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/add_item', $requestParameters);
    }

    /**
     * Use this call to delete a product item.
     *
     * @param array $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function deleteItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/delete_item', $requestParameters);
    }

    /**
     * You can change the tier structure through this API. If you only define color, it is one tier, if you define color and size, it is two tier. Support two tier structures at most. This API can change no tier to one tier, no tier to two tier, one tier to two tier, two tier to one tier, one tier to no tier, two tier to no tier. More detail please check : https://open.shopee.com/developer-guide/219. Please create variants after an interval of 5 seconds after creating an item, as there may be a delay.
     *
     * @param array $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function initTierVariation($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/init_tier_variation', $requestParameters);
    }

    /**
     * This api can only be used without changing the tier structure, you can add options, delete options, and update the option image by this api. More detail please check: https://open.shopee.com/developer-guide/219
     * @param mixed $requestParameters
     * @return ResponseData
     */
    public function updateTierVariation($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/update_tier_variation', $requestParameters);
    }


    /**
     * Get boosted item list.
     *
     * @param array|\ShopeePhp\RequestParameters $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function getBoostedList($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/product/get_boosted_list', $requestParameters);
    }

    /**
     * Boost item.
     *
     * @param array|Parameters\BoostItem $requestParameters
     * @return ResponseData The response is a JSON object.
     */
    public function boostItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/product/boost_item', $requestParameters);
    }
}
