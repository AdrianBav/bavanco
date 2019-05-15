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
            'ydt_unique_visits' => $this->get_visit_statistics($card),
            'domains' => 4,
            'microsites' => 8,
        ];
	}
}
