<?php

namespace ShopeePhp\Traits;

trait ItemId
{
    /**
     * Specifies the starting entry of data to return in the current call. Default is "". If data
     *  is more than one page, the offset can be some entry to start next call.
     *
     * @param integer $value
     * @return void
     */
    public function setItemId(int $value)
    {
        $this->parameters['item_id'] = $value;
    }

    public function getItemId()
    {
        return $this->parameters['item_id'];
    }
}
