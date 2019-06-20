<?php

namespace App\Services;

use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Log;
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
            'base_uri' => config('services.ipgeolocation.baseurl')
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
            Log::info("Failed to geocode IP address: {$ipAddress}");
            Log::debug(Psr7\str($e->getResponse()));

            return new DummyIpgeoResponse;
        }

        $body = $response->getBody();
        $stringBody = (string) $body;

        return json_decode($stringBody);
    }
}
