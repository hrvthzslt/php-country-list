<?php

namespace HrvthZslt\PhpCountryList\Models;


class Continent
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $code;

    /**
     * Continent constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->code = $data['code'];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}