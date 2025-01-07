<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class DeleteDiscountItem extends RequestParameters
{
    public function setDiscountId(string $value)
    {
        $this->parameters['discount_id'] = $value;
    }

    public function getDiscountId()
    {
        return $this->parameters['discount_id'];
    }

    public function setItemId(string $value)
    {
        $this->parameters['item_id'] = $value;
    }

    public function getItemId()
    {
        return $this->parameters['item_id'];
    }

    public function setModelId(string $value)
    {
        $this->parameters['model_id'] = $value;
    }

    public function getModelId()
    {
        return $this->parameters['model_id'];
    }
}
