<?php

namespace ShopeePhp\Nodes\Merchant\Parameters;

use ShopeePhp\RequestParameters;

class GetShopListByMerchant extends RequestParameters
{
    /**
     * Specifies the page number of data to return in the current call.
     * Starting from 1. if data is more than one page, the page_no can be
     * some entry to start next call.
     *
     * @param integer $value
     * @return void
     */
    public function setPageNo(int $value)
    {
        $this->parameters['page_no'] = $value;
    }

    public function getPageNo()
    {
        return $this->parameters['page_no'];
    }


    /**
     * Each result set is returned as a page of entries.
     * Use the "page_size" filters to control the maximum
     * number of entries to retrieve per page (i.e., per call),
     *  and the "page_no" to start next call. This integer value
     * is used to specify the maximum number of entries to return
     * in a single "page" of data. No more than 500.
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
