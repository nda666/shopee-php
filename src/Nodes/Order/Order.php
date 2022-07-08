<?php

namespace ShopeePhp\Nodes\Order;

use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Order extends NodeAbstract
{
    /**
     * Use this api to search orders.
     * @param array|Parameters\GetOrderList $parameters
     * @return ResponseData
     */
    public function getOrderList($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_order_list', $requestParameters);
    }

    /**
     * Use this api to get order detail.
     *
     * @param array|Parameters\GetOrderDetail $parameters
     * @return ResponseData
     */
    public function getOrderDetail($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_order_detail', $requestParameters);
    }

    /**
     * Use this api to get order detail.
     *
     * @param array|Parameters\GetShipmentList $parameters
     * @return ResponseData
     */
    public function getShipmentList($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/order/get_shipment_list', $requestParameters);
    }
}
