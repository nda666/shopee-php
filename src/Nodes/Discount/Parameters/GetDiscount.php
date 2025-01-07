<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class GetDiscount extends RequestParameters
{
    public function setDiscountId(string $value)
    {
        $this->parameters['discount_id'] = $value;
    }

    public function getDiscountId()
    {
        return $this->parameters['discount_id'];
    }

    public function setPageNo(int $value)
    {
        $this->parameters['page_no'] = $value;
    }

    public function getPageNo()
    {
        return $this->parameters['page_no'];
    }

    public function setPageSize(int $value)
    {
        $this->parameters['page_size'] = $value;
    }

    public function getPageSize()
    {
        return $this->parameters['page_size'];
    }
}
