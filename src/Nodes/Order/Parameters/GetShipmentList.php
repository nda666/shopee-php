<?php

namespace ShopeePhp\Nodes\Order\Parameters;

use ShopeePhp\RequestParameters;
use ShopeePhp\Traits\Cursor;
use ShopeePhp\Traits\PageSize;

class GetShipmentList extends RequestParameters
{
    use Cursor;
    use PageSize;
}
