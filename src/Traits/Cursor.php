<?php

namespace ShopeePhp\Traits;

trait Cursor
{
    /**
     * Specifies the starting entry of data to return in the current call. Default is "". If data
     *  is more than one page, the offset can be some entry to start next call.
     *
     * @param integer $value
     * @return void
     */
    public function setCursor(int $value)
    {
        $this->parameters['cursor'] = $value;
    }

    public function getCursor()
    {
        return $this->parameters['cursor'];
    }
}
