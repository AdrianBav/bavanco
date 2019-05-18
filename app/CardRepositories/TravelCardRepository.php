<?php

namespace App\CardRepositories;

use App\CardRepository;

class TravelCardRepository extends CardRepository
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
            'total_collections' => 10,
            'total_photos' => 351,
        ];
    }
}
