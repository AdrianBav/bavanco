<?php

namespace App;

use GuzzleHttp\Client as HttpClient;

class WorldTemperatures
{
    /**
     * A client for use with the weather API.
     *
     * @var  \GuzzleHttp\Client
     */
    protected $client;

    /**
     * The weather APIs key.
     *
     * @var  string
     */
    protected $apiKey;

    /**
     * Inialize the weather API client.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->client = new HttpClient([
            'base_uri' => 'http://api.openweathermap.org/data/2.5/'
        ]);

        $this->apiKey = config('services.openweathermap.apikey');
    }

    /**
     * Get the temperate of the given coordinates.
     *
     * @param   string  $city
     * @param   string  $lat
     * @param   string  $lng
     * @return  integer
     */
    public function fromLatLng($city, $lat, $lng)
    {
        $weather = $this->weather($lat, $lng);

        return $weather->main->temp;
    }

    /**
     * Make the API request.
     *
     * @param   string  $lat
     * @param   string  $lng
     * @return  array
     */
    protected function weather($lat, $lng)
    {
        $response = $this->client->request('GET', 'weather', ['query' => [
            'lat' => $lat,
            'lon' => $lng,
            'units' => 'metric',
            'appid' => $this->apiKey
        ]]);

        $body = $response->getBody();
        $stringBody = (string) $body;

        return json_decode($stringBody);
    }
}
