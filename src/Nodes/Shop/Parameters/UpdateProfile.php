<?php

namespace ShopeePhp\Nodes\Product\Parameters;

use ShopeePhp\RequestParameters;

class UpdateProfile extends RequestParameters
{

    /**
     * The new shop name
     *
     * @param string $value
     * @return void
     */
    public function setShopName(string $value)
    {
        $this->parameters['shop_name'] = $value;
    }

    public function getShopName(){
        return $this->parameters['shop_name'];
    }

    /**
     * The new shop logo url. Recommend to use images
     *
     * @param string $value
     * @return void
     */
    public function setShopLogo(string $value)
    {
        $this->parameters['shop_logo'] = $value;
    }

    public function getShopLogo(){
        return $this->parameters['shop_logo'];
    }

    public function setDescription(string $value)
    {
        $this->parameters['description'] = $value;
    }

    public function getDescription(){
        return $this->parameters['description'];
    }
}