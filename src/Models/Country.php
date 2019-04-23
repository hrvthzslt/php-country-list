<?php

namespace HrvthZslt\PhpCountryList\Models;


class Country
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $alpha2;

    /**
     * @var string
     */
    public $alpha3;

    /**
     * @var string
     */
    public $numeric;

    /**
     * @var int
     */
    public $isd;

    /**
     * @var Continent
     */
    public $continent;

    /**
     * Country constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->alpha2 = $data['alpha2'];
        $this->alpha3 = $data['alpha3'];
        $this->numeric = $data['numeric'];
        $this->isd = $data['isd'];
        $this->continent = new Continent($data['continent']);
    }

    /**
     * @param $continentCode
     * @return bool
     */
    public function inContinent($continentCode)
    {
        return $this->continent->code === strtoupper($continentCode);
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $vars = call_user_func('get_object_vars', $this);
        $vars['continent'] = $vars['continent']->toArray();
        return $vars;
    }
}