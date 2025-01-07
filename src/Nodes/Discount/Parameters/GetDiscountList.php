<?php

namespace ShopeePhp\Nodes\Discount\Parameters;

use ShopeePhp\RequestParameters;

class GetDiscountList extends RequestParameters
{
    public function setDiscountStatus(string $value)
    {
        $this->parameters['discount_status'] = $value;
    }

    public function getDiscountStatus()
    {
        return $this->parameters['discount_status'];
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

    public function setUpdateTimeFrom(string $value)
    {
        $this->parameters['update_time_from'] = $value;
    }

    public function getUpdateTimeFrom()
    {
        return $this->parameters['update_time_from'];
    }

    public function setUpdateTimeTo(string $value)
    {
        $this->parameters['update_time_to'] = $value;
    }

    public function getUpdateTimeTo()
    {
        return $this->parameters['update_time_to'];
    }
}
