<?php

namespace App\Traits;

trait TokenParameter
{
    public function getCode(): string
    {
        return $this->parameters['code'];
    }

    /**
     * The code in redirect url after the authorization. Valid for one-time
     *  use, expires in 10 minutes
     *
     * @param string $name
     * @return $this
     */
    public function setCode(string $name)
    {
        $this->parameters['code'] = $name;

        return $this;
    }

    public function getPartnerId(): string
    {
        return $this->parameters['partner_id'];
    }

    /**
     * Partner ID is assigned upon registration is successful. Required for all requests.
     *
     * @param string $name
     * @return $this
     */
    public function setPartnerId(string $name)
    {
        $this->parameters['partner_id'] = $name;

        return $this;
    }

    public function getShopId(): string
    {
        return $this->parameters['shop_id'];
    }

    /**
     * Shopee's unique identifier for a shop. You can only select one of
     *  main_account_id and shop_id in the request param.
     *
     * @param string $name
     * @return $this
     */
    public function setShopId(string $name)
    {
        $this->parameters['shop_id'] = $name;

        return $this;
    }

    public function getMainAccountId(): string
    {
        return $this->parameters['main_account_id'];
    }

    /**
     * Shopee's unique identifier for a shop. You can only select one of
     *  main_account_id and shop_id in the request param.
     *
     * @param string $name
     * @return $this
     */
    public function setMainAccountId(string $name)
    {
        $this->parameters['main_account_id'] = $name;

        return $this;
    }
}
