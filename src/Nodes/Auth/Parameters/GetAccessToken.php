<?php

namespace ShopeePhp\Nodes\Auth\Parameters;

use App\Traits\Code;
use App\Traits\MainAccountId;
use App\Traits\PartnerId;
use App\Traits\ShopId;
use ShopeePhp\RequestParameters;

class GetAccessToken extends RequestParameters
{
    use Code;
    use PartnerId;
    use ShopId;
    use MainAccountId;
}
