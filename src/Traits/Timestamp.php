<?php

namespace ShopeePhp\Traits;

trait Timestamp
{
    public function getTimestamp(): string
    {
        return $this->parameters['timestamp'];
    }

    /**
     * This is to indicate the timestamp of the request. Required for all
     *  requests. Expires in 5 minutes.
     *
     * @param string $name
     * @return $this
     */
    public function setTimestamp(int $time)
    {
        $this->parameters['timestamp'] = $time;

        return $this;
    }
}
