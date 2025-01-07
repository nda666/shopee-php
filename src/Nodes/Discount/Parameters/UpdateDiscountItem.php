<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class UpdateDiscountItem extends RequestParameters
{
    public function setDiscountId(int $value)
    {
        $this->parameters['discount_id'] = $value;
    }

    public function getDiscountId()
    {
        return $this->parameters['discount_id'];
    }

    public function setItemList(array $value)
    {
        $this->parameters['item_list'] = $value;
    }

    public function getItemList()
    {
        return $this->parameters['item_list'];
    }
}
