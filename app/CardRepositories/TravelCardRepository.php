<?php

namespace App\CardRepositories;

use App\Card;
use App\CardRepository;

class TravelCardRepository extends CardRepository
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
            'total_collections' => 10,
            'total_photos' => 351,
        ];
	}
}
