<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class AddDiscount extends RequestParameters
{
    /**
     * Shopee's unique identifier for the package under an order. You shouldn't fill the field with
     *  empty string when there isn't a package number.
     *
     * @param string $value
     * @return void
     */
    public function setDiscountName(string $value)
    {
        $this->parameters['discount_name'] = $value;
    }

    public function getDiscountName()
    {
        return $this->parameters['discount_name'];
    }
}
