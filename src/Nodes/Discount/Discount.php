<?php

namespace ShopeePhp\Nodes\Discount;

use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Discount extends NodeAbstract
{
    /**
     * Use this api to get all supported logistic channels.
     *
     * @param array|Parameters\AddDiscount $requestParameters
     * @return ResponseData
     */
    public function addDiscount($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/add_discount', $requestParameters);
    }

    /**
     * Use this api to add items to a discount.
     *
     * @param array|Parameters\AddDiscountItem $requestParameters
     * @return ResponseData
     */
    public function addDiscountItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/add_discount_item', $requestParameters);
    }

    /**
     * Use this api to delete a discount.
     *
     * @param array|Parameters\DeleteDiscount $requestParameters
     * @return ResponseData
     */
    public function deleteDiscount($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/delete_discount', $requestParameters);
    }

    /**
     * Use this api to delete items from a discount.
     *
     * @param array|Parameters\DeleteDiscountItem $requestParameters
     * @return ResponseData
     */
    public function deleteDiscountItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/delete_discount_item', $requestParameters);
    }

    /**
     * Use this api to get a discount.
     *
     * @param array|Parameters\GetDiscount $requestParameters
     * @return ResponseData
     */
    public function getDiscount($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/discount/get_discount', $requestParameters);
    }

    /**
     * Use this api to get a list of discounts.
     *
     * @param array|Parameters\GetDiscountList $requestParameters
     * @return ResponseData
     */
    public function getDiscountList($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/discount/get_discount_list', $requestParameters);
    }

    /**
     * Use this api to update a discount.
     *
     * @param array|Parameters\UpdateDiscount $requestParameters
     * @return ResponseData
     */
    public function updateDiscount($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/update_discount', $requestParameters);
    }

    /**
     * Use this api to update items in a discount.
     *
     * @param array|Parameters\UpdateDiscountItem $requestParameters
     * @return ResponseData
     */
    public function updateDiscountItem($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/update_discount_item', $requestParameters);
    }

    /**
     * Use this api to end a discount.
     *
     * @param array|Parameters\EndDiscount $requestParameters
     * @return ResponseData
     */
    public function endDiscount($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/discount/end_discount', $requestParameters);
    }
}
