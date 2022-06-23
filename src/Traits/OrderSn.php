<?php

namespace ShopeePhp\Traits;

trait OrderSn
{
    /**
     * Specifies the starting entry of data to return in the current call. Default is "". If data
     *  is more than one page, the offset can be some entry to start next call.
     *
     * @param string $value
     * @return void
     */
    public function setOrderSn(string $value)
    {
        $this->parameters['order_sn'] = $value;
    }

    public function getOrderSn()
    {
        return $this->parameters['order_sn'];
    }
}
