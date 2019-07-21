<?php

namespace App\Services;

use Zttp\Zttp;
use Zttp\ConnectionException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SiteMeta
{
    /**
     * Site identifier slug.
     *
     * @var  string
     */
    protected $siteSlug;

    /**
     * Site meta data.
     *
     * @var  string
     */
    protected $siteMeta;

    /**
     * Instantiate the SiteMeta class.
     *
     * @param  string  $siteSlug
     */
    public function __construct($siteSlug)
    {
        $this->siteSlug = $siteSlug;
        $this->siteMeta = null;

        $this->initalize();
    }

    /**
     * Initalize the class.
     *
     * @return  void
     */
    private function initalize()
    {
        $siteDetails = $this->findSiteDetails();

        $this->siteMeta = ($siteDetails)
            ? $this->callSiteMetaApi($siteDetails->url, $siteDetails->token)
            : $this->nullObject();

        $this->hydrate();
    }

    /**
     * Find site details.
     *
     * @return  Object|null
     */
    private function findSiteDetails()
    {
        $details = DB::table('site_details')->whereSlug($this->siteSlug)->first();

        if (App::environment('local') && ! is_null($details)) {
            $details->url = local_url($details->url, $removeSsl = true);
        }

        return $details;
    }

    /**
     * Call site meta api.
     *
     * @param   string  $url
     * @param   string  $token
     * @return  Object
     */
    private function callSiteMetaApi($url, $token)
    {
        try {
            $response = Zttp::withHeaders([
                'Authorization' => "Bearer {$token}",
                'Accept' => 'application/json',
            ])->get($url);

        } catch (ConnectionException $e) {
            return $this->nullObject();
        }

        if (! $response->isOk()) {
            return $this->nullObject();
        }

        return json_decode($response->body());
    }

    /**
     * Hydrate the meta object.
     *
     * @return  void
     */
    private function hydrate()
    {
        $this->siteMeta->itemOne = sprintf($this->siteMeta->item1, $this->siteMeta->number1);
        $this->siteMeta->itemTwo = sprintf($this->siteMeta->item2, $this->siteMeta->number2);
    }

    /**
     * Define a null meta object.
     *
     * @return  Object
     */
    private function nullObject()
    {
        return (object) [
            'item1' => '%d items',
            'number1' => 0,
            'item2' => '%d items',
            'number2' => 0,
            'info' => 'No info',
        ];
    }

    /**
     * Get the meta object.
     *
     * @return  Object
     */
    public function get()
    {
        return $this->siteMeta;
    }
}
