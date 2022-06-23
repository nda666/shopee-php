<?php

namespace ShopeePhp\Nodes\Logistics;

use ShopeePhp\CommonParameters;
use ShopeePhp\ResponseData;
use ShopeePhp\Nodes\NodeAbstract;

class Logistics extends NodeAbstract
{
    /**
     * Use this api to get all supported logistic channels.
     *
     * @param array|CommonParameters $parameters
     * @param array $parameters
     * @return ResponseData
     */
    public function getChannelList($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_channel_list', $commonParameters, $requestParameters);
    }

    /**
     * Use this api to fetch the logistics information of an order, these info can be used for airwaybill printing.
     *
     * @param array|CommonParameters $parameters
     * @param array|Parameters\GetShippingDocumentInfo $parameters
     * @return ResponseData
     */
    public function getShippingDocumentInfo($commonParameters = [], $requestParameters = []): ResponseData
    {
        return $this->get('/api/v2/logistics/get_shipping_document_info', $commonParameters, $requestParameters);
    }
}
