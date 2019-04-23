<?php

namespace HrvthZslt\PhpCountryList;


use HrvthZslt\PhpCountryList\Data\CountryBucket;
use HrvthZslt\PhpCountryList\Models\Country;

class PhpCountryList
{
    /**
     * @var CountryBucket
     */
    private $countryBucket;

    /**
     * HrvthZslt\PhpCountryList constructor.
     */
    public function __construct()
    {
        $this->countryBucket = new CountryBucket();
    }

    /**
     * @return array
     */
    public function getAllCountries()
    {
        return $this->getCountryInstances($this->countryBucket->get());
    }

    /**
     * @param $continentCode
     * @return array
     */
    public function getAllCountriesForContinent($continentCode)
    {
        return $this->getCountryInstances(
            array_filter($this->countryBucket->get(), function ($countryData) use ($continentCode) {
                return $countryData['continent']['code'] === strtoupper($continentCode);
            })
        );
    }

    /**
     * @param $input
     * @return bool|Country
     */
    public function getCountryByAlpha2($input)
    {
        return $this->searchCountry('alpha2', $input);
    }

    /**
     * @param $input
     * @return bool|Country
     */
    public function getCountryByAlpha3($input)
    {
        return $this->searchCountry('alpha3', $input);
    }

    /**
     * @param $input
     * @return bool|Country
     */
    public function getCountryByNumericCode($input)
    {
        return $this->searchCountry('numeric', $input);
    }

    /**
     * @param $input
     * @return bool|Country
     */
    public function getCountryByIsd($input)
    {
        return $this->searchCountry('isd', $input);
    }

    /**
     * @param $countriesData
     * @return array
     */
    private function getCountryInstances($countriesData)
    {
        return array_map(function($countryData) {
            return new Country($countryData);
        }, $countriesData);
    }

    /**
     * @param $field
     * @param $value
     * @return bool|Country
     */
    private function searchCountry($field, $value)
    {
        $key = array_search(strtoupper($value), array_column($this->countryBucket->get(), $field));

        if ( $key === false ) {
            return false;
        }

        return new Country($this->countryBucket->get()[$key]);
    }
}