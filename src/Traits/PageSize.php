<?php

namespace ShopeePhp\Traits;

trait PageSize
{
    /**
     * Each result set is returned as a page of entries. Use the "page_size"
     *  filters to control the maximum number of entries to retrieve per page
     *  (i.e., per call). This integer value is used to specify the maximum
     *  number of entries to return in a single "page" of data.The limit of
     *  page_size if between 1 and 100
     *
     * @param integer $value
     * @return void
     */
    public function setPageSize(int $value)
    {
        $this->parameters['page_size'] = $value;
    }

    public function getPageSize()
    {
        return $this->parameters['page_size'];
    }
}
