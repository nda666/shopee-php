<?php
namespace App\Traits;

trait MainAccountId {
    
    public function getMainAccountId(): string
    {
        return $this->parameters['main_account_id'];
    }

    /**
     * Shopee's unique identifier for a shop. You can only select one of main_account_id and shop_id in the request param.
     *
     * @param string $name
     * @return $this
     */
    public function setMainAccountId(string $name)
    {
        $this->parameters['main_account_id'] = $name;

        return $this;
    }
}
