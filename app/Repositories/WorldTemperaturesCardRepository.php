<?php

namespace App\Repositories;

use App\Repositories\Cards\CardRepository;

use App\Card;

class WorldTemperaturesCardRepository implements CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */ 
	public function getData(Card $card)
	{
        $data = array(
            'dallas' => '50/90',
            'london' => '20/60',
            'honolulu' => '45/85', 
        );

        return $data;		
	}

}
