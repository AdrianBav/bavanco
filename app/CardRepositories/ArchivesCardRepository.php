<?php

namespace App\CardRepositories;

use App\CardRepository;

class ArchivesCardRepository extends CardRepository
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
            'active_years' => date('Y') - 1999,
            'domains' => 3,
        ];
    }
}
