<?php

namespace ShopeePhp\Traits;

trait MerchantId
{
    public function getMerchantId(): string
    {
        return $this->parameters['merchant_id'];
    }

    /**
     * Merchantee's unique identifier for a merchant. You can only select one
     *  of main_account_id and merchant_id in the request param.
     *
     * @param string $name
     * @return $this
     */
    public function setMerchantId(string $name)
    {
        $this->parameters['merchant_id'] = $name;

        return $this;
    }
}
