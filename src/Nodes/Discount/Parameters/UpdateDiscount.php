<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class UpdateDiscount extends RequestParameters
{
    public function setDiscountId(int $value)
    {
        $this->parameters['discount_id'] = $value;
    }

    public function getDiscountId()
    {
        return $this->parameters['discount_id'];
    }
    public function setDiscountName(string $value)
    {
        $this->parameters['discount_name'] = $value;
    }

    public function getDiscountName()
    {
        return $this->parameters['discount_name'];
    }
    public function setStartTime(int $value)
    {
        $this->parameters['start_time'] = $value;
    }

    public function getStartTime()
    {
        return $this->parameters['start_time'];
    }

    public function setEndTime(int $value)
    {
        $this->parameters['end_time'] = $value;
    }

    public function getEndTime()
    {
        return $this->parameters['end_time'];
    }
}
