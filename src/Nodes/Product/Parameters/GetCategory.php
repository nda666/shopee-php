<?php

namespace ShopeePhp\Nodes\Product\Parameters;

use ShopeePhp\RequestParameters;

class GetCategory extends RequestParameters
{
    public function getLanguage(): string
    {
        return $this->parameters['language'];
    }

     /**
     * If language is not uploaded, the default language=en, the following are
     *  the languages supported by different markets SG: en ; MY: en / ms-my /
     *  zh-hans ; TH: en / th ; VN: en / vi ; PH: en ; TW: en / zh-hant ; ID:
     *  en / id ; BR: en / pt-br ; MX: en / es-mx ; PL: pl ; CO: en/es-CO ; CL:
     *  en/es-CL ; FR: en/fr ; ES: en/es-ES ; AR:en / es-ar Note: For markets
     *  that have already launched global tree, Crossboard shop only support
     *  returning en and zh-hans language data
     *
     * @param string $name
     * @return $this
     */
    public function setLanguage(string $name)
    {
        $this->parameters['language'] = $name;
        return $this;
    }
}
