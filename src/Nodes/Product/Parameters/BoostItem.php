<?php

namespace ShopeePhp\Nodes\Product\Parameters;

use ShopeePhp\RequestParameters;

class BoostItem extends RequestParameters
{
    public function getItemIdList(): string
    {
        return $this->parameters['item_id_list'];
    }

     /**
     * Shopee's unique identifier for an item, limit:[1,5]
     *
     * @param array $value
     * @return $this
     */
    public function setItemIdList(string $value)
    {
        $this->parameters['item_id_list'] = $value;
        return $this;
    }
}
