<?php

namespace ShopeePhp;

use function hash_hmac;

class AuthLinkGenerator implements AuthLinkGeneratorInterface
{
    private $partnerKey;
    private $partnerId;
    private int $timestamp;

    public function __construct(string $partnerId, string $partnerKey, int $timestamp = null)
    {
        $this->partnerKey = $partnerKey;
        $this->partnerId = $partnerId;
        $this->timestamp = $timestamp ? $timestamp : time();
    }

    public function generate(): string
    {
        $apiPath = '/api/v2/shop/auth_partner';
        $timeStamp = $this->timestamp;
        $baseString = $this->partnerId . $apiPath . $timeStamp;
        $sign = hash_hmac('sha256', $baseString, $this->partnerKey);
        $query = http_build_query([
            'partner_id' => $this->partnerId,
            'sign' => $sign,
            'redirect' => $this->redirect,
            'timestamp' => $timeStamp
        ], '', '&');

        return 'https://partner.shopeemobile.com/api/v2/shop/auth_partner?' . $query;
    }
}
