<?php

namespace App\CardRepositories;

use App\CardRepository;

class SitesCardRepository extends CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @return array
     */
    public function getData()
    {
        return [
            'since' => $this->getDaysSince(),
            'meta' => $this->getMetaData(),
            'visits' => $this->getSiteVisits(),
        ];
    }

    /**
     * Get the cards site meta data.
     *
     * @return  array
     */
    private function getMetaData()
    {
        return [
            'domains' => 4,
            'microsites' => 8,
        ];
    }
}
