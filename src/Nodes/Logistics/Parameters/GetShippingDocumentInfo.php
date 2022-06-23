<?php

namespace ShopeePhp\Nodes\Logistics\Parameters;

use ShopeePhp\RequestParameters;
use ShopeePhp\Traits\OrderSn;

class GetShippingDocumentInfo extends RequestParameters
{
    use OrderSn;

    /**
     * Shopee's unique identifier for the package under an order. You shouldn't fill the field with
     *  empty string when there isn't a package number.
     *
     * @param string $value
     * @return void
     */
    public function setPackageNumber(string $value)
    {
        $this->parameters['package_number'] = $value;
    }

    public function getPackageNumber()
    {
        return $this->parameters['package_number'];
    }
}
