<?php

namespace ShopeePhp\Nodes\Auth\Parameters;

use ShopeePhp\Traits\Code;
use ShopeePhp\Traits\MainAccountId;
use ShopeePhp\Traits\PartnerId;
use ShopeePhp\Traits\ShopId;
use ShopeePhp\RequestParameters;

class GetAccessToken extends RequestParameters
{
    use Code;
    use PartnerId;
    use ShopId;
    use MainAccountId;
}
