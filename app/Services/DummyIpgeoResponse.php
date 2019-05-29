<?php

namespace App\Services;

class DummyIpgeoResponse
{
    /**
     * Dummy city.
     *
     * @var  string
     */
    public $city;

    /**
     * Dummy state.
     *
     * @var  string
     */
    public $state_prov;

    /**
     * Dummy ZIP code.
     *
     * @var  string
     */
    public $zipcode;

    /**
     * Dummy country.
     *
     * @var  string
     */
    public $country_name;

    /**
     * Dummy country flag.
     *
     * @var  string
     */
    public $country_flag;

    /**
     * Dummy continent name.
     *
     * @var  string
     */
    public $continent_name;

    /**
     * Instantiate the DummyIpgeoResponse class.
     *
     * @return   void
     */
    public function __construct()
    {
        $this->city = 'Unknown';
        $this->state_prov = 'Unknown';
        $this->zipcode = 'Unknown';
        $this->country_name = 'Unknown';
        $this->country_flag = asset('images/card.png');
        $this->continent_name = 'Unknown';
    }
}
