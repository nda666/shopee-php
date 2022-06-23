<?php

namespace ShopeePhp;

use function hash_hmac;

class AuthLinkGenerator implements AuthLinkGeneratorInterface
{
    private $partnerKey;
    private $partnerId;
    private $timestamp;

    public function __construct(string $partnerId, string $partnerKey, $timestamp = null)
    {
        $this->partnerKey = $partnerKey;
        $this->partnerId = $partnerId;
        $this->timestamp = $timestamp ? $timestamp : time();
    }

    public function generate(string $redirect): string
    {
        $apiPath = '/api/v2/shop/auth_partner';
        $timeStamp = $this->timestamp;
        $baseString = $this->partnerId . $apiPath . (string) $timeStamp;
        $sign = hash_hmac('sha256', $baseString, $this->partnerKey);
        $query = http_build_query([
            'partner_id' => (int) $this->partnerId,
            'sign' => $sign,
            'redirect' => $redirect,
            'timestamp' => (int) $timeStamp
        ], '', '&');

        return 'https://partner.shopeemobile.com/api/v2/shop/auth_partner?' . $query;
    }
}
