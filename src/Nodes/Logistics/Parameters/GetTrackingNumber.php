<?php

namespace ShopeePhp\Nodes\Logistics\Parameters;

use ShopeePhp\RequestParameters;
use ShopeePhp\Traits\OrderSn;
use ShopeePhp\Traits\PackageNumber;

class GetTrackingNumber extends RequestParameters
{
    use OrderSn;
    use PackageNumber;

     /**
     * Indicate response fields you want to get. Please select from the below response parameters.
     *  If you input an object field, all the params under it will be included automatically in the
     *  response. If there are multiple response fields you want to get, you need to use English
     *  comma to connect them. Available values: plp_number, first_mile_tracking_number,last_mile_tracking_number
     *
     * @param string $value
     * @return void
     */
    public function setResponseOptionalFields(string $value)
    {
        $this->parameters['response_optional_fields'] = $value;
    }

    public function getResponseOptionalFields()
    {
        return $this->parameters['response_optional_fields'];
    }
}
