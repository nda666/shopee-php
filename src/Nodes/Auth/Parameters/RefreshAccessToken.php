<?php

namespace ShopeePhp\Nodes\Auth\Parameters;

use App\Traits\MerchantId;
use App\Traits\PartnerId;
use App\Traits\ShopId;
use ShopeePhp\RequestParameters;

class RefreshAccessToken extends RequestParameters
{
    use PartnerId;
    use ShopId;
    use MerchantId;

    public function getRefreshToken(): string
    {
        return $this->parameters['refresh_token'];
    }

    /**
     * The code in redirect url after the authorization. Valid for one-time use, expires in 10 minutes
     *
     * @param string $name
     * @return $this
     */
    public function setRefreshToken(string $name)
    {
        $this->parameters['refresh_token'] = $name;

        return $this;
    }
}
