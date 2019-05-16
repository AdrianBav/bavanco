<?php

namespace App\CardRepositories;

use App\Card;
use App\CardRepository;

class SitesCardRepository extends CardRepository
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
            'domains' => 4,
            'microsites' => 8,
        ];
	}
}
