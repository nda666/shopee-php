<?php

namespace ShopeePhp\Nodes\Order;

use ShopeePhp\CommonParameters;
use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Order extends NodeAbstract
{
    /**
     * Use this api to search orders.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetOrderList $parameters
     * @return ResponseData
     */
    public function getOrderList($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_order_list', $commonParameters, $requestParameters);
    }

    /**
     * Use this api to get order detail.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetOrderDetail $parameters
     * @return ResponseData
     */
    public function getOrderDetail($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_order_detail', $commonParameters, $requestParameters);
    }

    /**
     * Use this api to get order detail.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetShipmentList $parameters
     * @return ResponseData
     */
    public function getShipmentList($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_shipment_list', $commonParameters, $requestParameters);
    }
}
