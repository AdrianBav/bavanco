<?php

namespace App\Repositories;

use App\Card;
use Carbon\Carbon;
use App\CardRepository;

class WorldTimesCardRepository extends CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */
	public function getData(Card $card)
	{
        // Calculate the percent of the year that has elapsed
        $dt = Carbon::now();
        $days_in_year = ($dt->isLeapYear()) ? 366 : 365;
        $day_of_year = $dt->dayOfYear;
        $percent_of_year = floor(($day_of_year / $days_in_year) * 100);

        $data = [
            'dallas'   => Carbon::now('America/Chicago')->format('g:i a'),
            'london'   => Carbon::now('Europe/London')->format('g:i a'),
            'melbourne' => Carbon::now('Australia/Melbourne')->format('g:i a'),
            'percent'  => "{$percent_of_year}%",
        ];

        return $data;
	}
}
