<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class AddDiscountItem extends RequestParameters
{
    /**
     * Shopee's unique identifier for the package under an order. You shouldn't fill the field with
     *  empty string when there isn't a package number.
     *
     * @param string $value
     * @return void
     */
    public function setDiscountId(string $value)
    {
        $this->parameters['discount_id'] = $value;
    }

    public function getDiscountId()
    {
        return $this->parameters['discount_id'];
    }

    /**
     * Set the list of items for the discount.
     *
     * @param array $value
     * @return void
     */
    public function setItemList(array $value)
    {
        $this->parameters['item_list'] = $value;
    }

    public function getItemList()
    {
        return $this->parameters['item_list'];
    }
}
