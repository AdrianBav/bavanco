<?php

namespace App\Services;

use App\Services\DummyIpgeoResponse;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;

class IpAddressDetails
{
    /**
     * Instantiate the IpAddressDetails class.
     */
    public function __construct()
    {
        $this->client = new HttpClient([
            'base_uri' => 'https://api.ipgeolocation.io/'
        ]);

        $this->apiKey = config('services.ipgeolocation.apikey');
    }

    /**
     * Get IP address details.
     *
     * @param   string  $ipAddress
     * @return  Object
     */
    public function getDetails($ipAddress)
    {
        return $this->ipgeo($ipAddress);
    }

    /**
     * Make the API request.
     *
     * @param   string  $ipAddress
     * @return  array
     */
    protected function ipgeo($ipAddress)
    {
        try {
            $response = $this->client->request('GET', 'ipgeo', ['query' => [
                'ip' => $ipAddress,
                'apiKey' => $this->apiKey,
            ]]);
        } catch (ClientException $e) {
            return new DummyIpgeoResponse;
        }

        $body = $response->getBody();
        $stringBody = (string) $body;

        return json_decode($stringBody);
    }
}
