<?php

namespace ShopeePhp;

interface AuthLinkGeneratorInterface
{
    /**
     * Use this to get shopee auth link
     * https://open.shopee.com/documents/v2/OpenAPI%202.0%20Overview?module=87&type=2
     *
     * @param string $redirect success redirect url
     * @return string
     */
    public function generate(string $redirect): string;
}
