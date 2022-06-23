<?php

namespace ShopeePhp\Nodes\Order\Parameters;

use ShopeePhp\RequestParameters;

class GetOrderDetail extends RequestParameters
{
    /**
     * The set of order_sn. If there are multiple order_sn, you need to use English comma to
     *  connect them. limit [1,50]
     *
     * @param string $value
     * @return void
     */
    public function setOrderSnList(array $value)
    {
        $this->parameters['order_sn_list'] = $value;
    }

    public function getOrderSnList()
    {
        return $this->parameters['order_sn_list'];
    }

    /**
     * Indicate response fields you want to get. Please select from the below response parameters.
     *  If you input an object field, all the params under it will be included automatically in the
     *  response. If there are multiple response fields you want to get, you need to use English
     *  comma to connect them. Available values: buyer_user_id,buyer_username,
     * estimated_shipping_fee,recipient_address,actual_shipping_fee ,goods_to_declare,note,
     * note_update_time,item_list,pay_time,dropshipper,dropshipper_phone,split_up,
     * buyer_cancel_reason,cancel_by,cancel_reason,actual_shipping_fee_confirmed,buyer_cpf_id,
     * fulfillment_flag,pickup_done_time,package_list,shipping_carrier,payment_method,total_amount,
     * buyer_username,invoice_data, checkout_shipping_carrier, reverse_shipping_fee,
     *  order_chargeable_weight_gram etc.
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
