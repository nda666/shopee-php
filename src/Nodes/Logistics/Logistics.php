<?php

namespace ShopeePhp\Nodes\Logistics;

use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Logistics extends NodeAbstract
{
    /**
     * Use this api to get all supported logistic channels.
     *
     * @param array $parameters
     * @return ResponseData
     */
    public function getChannelList($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_channel_list', $requestParameters);
    }

    /**
     * Use this api to fetch the logistics information of an order, these info can be used for airwaybill printing.
     *
     * @param array|Parameters\GetShippingDocumentInfo $parameters
     * @deprecated use getShippingDocumentDataInfo instead
     * @return ResponseData
     */
    public function getShippingDocumentInfo($requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_shipping_document_info', $requestParameters);
    }

    /**
     * Use this api to fetch the logistics information of an order, these info can be used for airwaybill printing. Dedicated for crossborder SLS order airwaybill. May not be applicable for local channel airwaybill. Besides, this api supports returning personal info as images.
     *
     * @param array $requestParameters
     * @return ResponseData
     */
    public function getShippingDocumentDataInfo($requestParameters = []): ResponseData
    {
        return $this->post('/api/v2/logistics/get_shipping_document_data_info', $requestParameters);
    }

    /**
     * Use this api to get tracking_number when you hava shipped order.
     *
     * @param array $requestParameters
     * @return ResponseData
     */
    public function getTrackingNumber(
        $requestParameters = []
    ): ResponseData {
        return $this->get('/api/v2/logistics/get_tracking_number', $requestParameters);
    }
}
