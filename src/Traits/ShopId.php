<?php
namespace App\Traits;

trait ShopId {

    public function getShopId(): string
    {
        return $this->parameters['shop_id'];
    }

    /**
     * Shopee's unique identifier for a shop. You can only select one of main_account_id and shop_id in the request param.
     *
     * @param string $name
     * @return $this
     */
    public function setShopId(string $name)
    {
        $this->parameters['shop_id'] = $name;

        return $this;
    }
}
