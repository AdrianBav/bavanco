<?php

namespace App\Repositories\Cards;

use App\Card;

interface CardRepository
{
    /**
     * Get the data used for the given card.
     *
     * @param  Card  $card
     * @return array
     */	
	public function getData(Card $card);
}
