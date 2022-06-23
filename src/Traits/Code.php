<?php

namespace ShopeePhp\Traits;

trait Code
{
    public function getCode(): string
    {
        return $this->parameters['code'];
    }

    /**
     * The code in redirect url after the authorization.
     * Valid for one-time use, expires in 10 minutes
     *
     * @param string $name
     * @return $this
     */
    public function setCode(string $name)
    {
        $this->parameters['code'] = $name;

        return $this;
    }
}
