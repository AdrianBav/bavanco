<?php

namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Cache;

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
            'base_uri' => config('services.openweathermap.baseurl')
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
        $keyName = sprintf('weather-%s', $city);

        // @openweathermap.org
        // We recommend making calls to the API no more than one time every 10 minutes for one location
        $seconds = now()->addMinutes(15);

        $weather = Cache::remember($keyName, $seconds, function () use ($lat, $lng) {
            return $this->weather($lat, $lng);
        });

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
