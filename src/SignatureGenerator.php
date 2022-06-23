<?php

namespace ShopeePhp;

use function hash_hmac;

class SignatureGenerator implements SignatureGeneratorInterface
{
    private $partnerKey;

    public function __construct(string $partnerKey)
    {
        $this->partnerKey = $partnerKey;
    }

    public function generateSignature(
        string $partnerId,
        string $url,
        $timestamp = null,
        string $access_token = null,
        $shop_id = null
    ): string {
        $baseString = $partnerId . $url . ($timestamp ? $timestamp : time()) . $access_token . $shop_id;
        return  hash_hmac('sha256', $baseString, $this->partnerKey);
    }
}
