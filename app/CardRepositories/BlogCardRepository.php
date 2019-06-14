<?php

namespace App\CardRepositories;

use App\CardRepository;

class BlogCardRepository extends CardRepository
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
            'number_of_articles' => 4,
            'number_of_photos' => (1 + 3 + 7 + 6),
        ];
    }
}
