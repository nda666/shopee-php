<?php

namespace ShopeePhp\Tests;

use ShopeePhp\RequestParameters;

class RequestParametersClass extends RequestParameters
{
    protected $parameters = [
        'parameter' => 1,
    ];

    public function setParameter($parameter)
    {
        $this->parameters['parameter'] = $parameter;

        return $this;
    }

    public function setTestCamelcaseParameter($parameter)
    {
        $this->parameters['test_camelcase_parameter'] = $parameter;

        return $this;
    }

    public function setObjectParameter($parameter)
    {
        $this->parameters['object_parameter'] = $parameter;

        return $this;
    }
}
