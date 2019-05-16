<?php

namespace App\CardRepositories;

use App\Card;
use App\CardRepository;

class ArchivesCardRepository extends CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */
	public function getData(Card $card)
	{
        return [
            'visits' => $this->getSiteVisits($card),
            'active_years' => date('Y') - 1999,
            'domains' => 3,
        ];
	}
}
