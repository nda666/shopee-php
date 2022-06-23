<?php

namespace ShopeePhp\Traits;

trait PartnerId
{
    public function getPartnerId(): string
    {
        return $this->parameters['partner_id'];
    }

    /**
     * Partner ID is assigned upon registration is successful. Required for all
     *  requests.
     *
     * @param string $name
     * @return $this
     */
    public function setPartnerId(string $name)
    {
        $this->parameters['partner_id'] = $name;

        return $this;
    }
}
