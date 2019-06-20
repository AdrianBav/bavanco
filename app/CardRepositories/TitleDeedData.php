<?php

namespace App\CardRepositories;

use Illuminate\Support\Facades\Cache;

trait TitleDeedData
{
    /**
     * Get the data used for the card.
     *
     * @return array
     */
    public function getData()
    {
        $daysSince = Cache::remember($this->cacheKey('since'), $seconds = 43200, function () {
            return $this->getDaysSince();
        });

        $metaData = Cache::rememberForever($this->cacheKey('meta'), function () {
            return $this->getMetaData();
        });

        $siteVisits = Cache::remember($this->cacheKey('visits'), $seconds = 300, function () {
            return $this->getSiteVisits();
        });

        return [
            'since' => $daysSince,
            'meta' => $metaData,
            'visits' => $siteVisits,
        ];
    }

    /**
     * Generate a string for use as a cache key.
     *
     * @param   string  $type
     * @return  string
     */
    private function cacheKey($type)
    {
        return sprintf('%s-data-%s', $this->card->site_identifier, $type);
    }
}
