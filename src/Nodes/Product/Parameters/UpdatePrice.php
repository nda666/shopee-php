<?php

namespace ShopeePhp\Nodes\Product\Parameters;

use ShopeePhp\RequestParameters;
use ShopeePhp\Traits\ItemId;

class UpdatePrice extends RequestParameters
{
    use ItemId;

   /**
    * Length should be between 1 to 50
    *
    * @param array $value [model_id]: 0 for no model item. [original_price]: Original price for this
    * model. For CO local VAT responsible seller：Please remember the price you set in here must be
    * VAT inclusive. If you have any doubts on how to calculate VAT for your product please refer
    * to the Seller Education Hub（https://seller.shopee.com.co/edu/article/13565）For SG/MY/BR/MX
    * PL/ES/AR seller: Sellers can set the price with two decimal place, other regions can only set
    * the price as an integer.
    */
    public function setPriceList(array $value)
    {
        $this->parameters['price_list'] = $value;
    }

    public function getItemId()
    {
        return $this->parameters['price_list'];
    }
}
