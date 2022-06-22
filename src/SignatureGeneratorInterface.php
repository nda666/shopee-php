<?php

namespace ShopeePhp;

interface SignatureGeneratorInterface
{
    public function generateSignature(string $partnerId, string $url, int $timestamp = null): string;
}
