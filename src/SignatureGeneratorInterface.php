<?php

namespace ShopeePhp;

interface SignatureGeneratorInterface
{
    public function generateSignature(
        string $partnerId,
        string $url,
        $timestamp = null,
        string $access_token = null,
        $shop_id = null
    ): string;
}
