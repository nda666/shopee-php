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

    public function generateSignature(string $partnerId, string $url, int $timestamp = null): string
    {
        $baseString = $partnerId . $url . ($timestamp ? $timestamp : time());
        return  hash_hmac('sha256', $baseString,  $this->partnerKey);
    }
}
