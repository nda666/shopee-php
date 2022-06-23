<?php

namespace ShopeePhp\Nodes\Order\Parameters;

use ShopeePhp\RequestParameters;
use ShopeePhp\RequestParametersInterface;
use ShopeePhp\Traits\Cursor;
use ShopeePhp\Traits\PageSize;

class GetOrderList extends RequestParameters
{
    use Cursor;
    use PageSize;

    /**
     * The kind of time_from and time_to. Available value: create_time, update_time.
     *
     * @param string $value
     * @return void
     */
    public function setTimeRangeField(string $value)
    {
        $this->parameters['time_range_field'] = $value;
    }

    public function getTimeRangeField()
    {
        return $this->parameters['time_range_field'];
    }

    /**
     * The time_from and time_to fields specify a date range for retrieving orders (based on the
     *  time_range_field). The time_from field is the starting date range. The maximum date range
     *  that may be specified with the time_from and time_to fields is 15 days.
     *
     * @param string $value
     * @return void
     */
    public function setTimeFrom(int $value)
    {
        $this->parameters['time_from'] = $value;
    }

    public function getTimeFrom()
    {
        return $this->parameters['time_from'];
    }

    /**
     * The time_from and time_to fields specify a date range for retrieving orders (based on the
     *  time_range_field). The time_from field is the starting date range. The maximum date range
     *  that may be specified with the time_from and time_to fields is 15 days.
     *
     * @param string $value
     * @return void
     */
    public function setTimeTo(int $value)
    {
        $this->parameters['time_to'] = $value;
    }

    public function getTimeTo()
    {
        return $this->parameters['time_to'];
    }

    /**
     * The order_status filter for retriveing orders and each one only every request. Available
     *  value: UNPAID/READY_TO_SHIP/PROCESSED/SHIPPED/COMPLETED/IN_CANCEL/CANCELLED/INVOICE_PENDING
     *
     * @param string $value
     * @return void
     */
    public function setOrderStatus(string $value)
    {
        $this->parameters['order_status'] = $value;
    }

    public function getOrderStatus()
    {
        return $this->parameters['order_status'];
    }

    /**
     * Optional fields in response. Available value: order_status.
     *
     * @param string $value
     * @return void
     */
    public function setResponseOptionalFields(string $value)
    {
        $this->parameters['response_optional_fields'] = $value;
    }

    public function getResponseOptionalFields()
    {
        return $this->parameters['response_optional_fields'];
    }
}
