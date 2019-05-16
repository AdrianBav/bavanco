<?php

namespace App\CardRepositories;

use App\Card;
use App\CardRepository;

class BlogCardRepository extends CardRepository
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
            'number_of_articles' => 2,
            'number_of_photos' => 4,
        ];
	}
}
