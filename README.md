# PhpCountryList

Listing country alpha2, alpha3, numeric and isd codes with continent names and codes

## Usage

### Listing

Collect all countries

```php
$phpCountryList = new \HrvthZslt\PhpCountryList\PhpCountryList();
$countries = $phpCountryList->getAllCountries();
```

$countries content:

```
  ...
  156 => HrvthZslt\PhpCountryList\Models\Country {#1340
    +name: "Netherlands"
    +alpha2: "NL"
    +alpha3: "NLD"
    +numeric: "528"
    +isd: 31
    +continent: HrvthZslt\PhpCountryList\Models\Continent {#1341
      +name: "Europe"
      +code: "EU"
    }
  }
  157 => HrvthZslt\PhpCountryList\Models\Country {#1342
    +name: "New Caledonia"
    +alpha2: "NC"
    +alpha3: "NCL"
    +numeric: "540"
    +isd: 687
    +continent: HrvthZslt\PhpCountryList\Models\Continent {#1343
      +name: "Oceania"
      +code: "OC"
    }
  }
  ...
```

Collect countries for continent

```php
$phpCountryList = new \HrvthZslt\PhpCountryList\PhpCountryList();
$countries = $phpCountryList->getAllCountriesForContinent('NA');
```

### Search

Search for country by alpha2, alpha3, numeric code or isd code
```php
$country = $phpCountryList->getCountryByAlpha2('HM');
$country = $phpCountryList->getCountryByAlpha3('HMD');
$country = $phpCountryList->getCountryByNumericCode('334');
$country = $phpCountryList->getCountryByIsd(672);
```

These searches yields
```
HrvthZslt\PhpCountryList\Models\Country {#906
  +name: "Heard Island and Mcdonald Islands"
  +alpha2: "HM"
  +alpha3: "HMD"
  +numeric: "334"
  +isd: 672
  +continent: HrvthZslt\PhpCountryList\Models\Continent {#907
    +name: "Antarctica"
    +code: "AN"
  }
}
```

### Country instance

Check country continent, returns true or false

```php
/** @var HrvthZslt\PhpCountryList\Models\Country $country */
$result = $country->inContinent('EU');
```
Convert to array
```php
/** @var HrvthZslt\PhpCountryList\Models\Country $country */
$contryArray = $country->toArray();
```
$countryArray value
```
array:6 [
  "name" => "Antarctica"
  "alpha2" => "AQ"
  "alpha3" => "ATA"
  "numeric" => "010"
  "isd" => 672
  "continent" => array:2 [
    "name" => "Antarctica"
    "code" => "AN"
  ]
]
```