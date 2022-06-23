<?php

namespace ShopeePhp\Traits;

trait AccessToken
{
    public function getAccessToken(): string
    {
        return $this->parameters['access_token'];
    }

    /**
     * The token for API access, using to identify your permission to the api.
     * Valid for multiple use and expires in 4 hours.
     *
     * @param string $name
     * @return $this
     */
    public function setAccessToken(string $name)
    {
        $this->parameters['access_token'] = $name;

        return $this;
    }
}
