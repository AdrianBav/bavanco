<?php

namespace App\Repositories;

use App\Repositories\Cards\CardRepository;

use App\Card;
use Carbon\Carbon;

class WorldTimesCardRepository implements CardRepository
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
            'dallas' => Carbon::now('America/Chicago')->format('g:i a'),
            'london' => Carbon::now('Europe/London')->format('g:i a'),
            'honolulu' => Carbon::now('Pacific/Honolulu')->format('g:i a'),
        );

        return $data;		
	}

}
