<?php

namespace App\Repositories;

use App\Card;
use Forecast;
use Carbon\Carbon;
use App\CardRepository;

class WorldTemperaturesCardRepository extends CardRepository
{
    /**
     * Get the data used for the card.
     *
     * @param  Card  $card
     * @return array
     */
	public function getData(Card $card)
	{
        $data = array();

        $places = [
            'dallas'   => array('lat' => '32.8205865', 'long' => '-96.8714227'),
            'london'   => array('lat' => '51.5285582', 'long' => '-0.2416797'),
            'melbourne' => array('lat' => '-37.971237', 'long' => '144.4926947'),
        ];

        $now = Carbon::now();
        $now_formatted = $now->toIso8601String();

        // Request the current temperatures form the Forecast API
        foreach ($places as $place => $coorinates) {
            $forcast = Forecast::get($coorinates['lat'], $coorinates['long'], $now_formatted);
            $temp_in_c = $forcast['currently']['temperature'];

            $celsius = round($temp_in_c);
            $fahrenheit = round(($temp_in_c * 1.8) + 32);

            $data[$place] = "{$celsius}/{$fahrenheit}";
        }

        // Determine the current season in Dallas
        $spring = Carbon::createFromDate(null, 3, 20);
        $summer = Carbon::createFromDate(null, 6, 21);
        $fall = Carbon::createFromDate(null, 9, 22);
        $winter = Carbon::createFromDate(null, 12, 21);

        if ($now->gte($winter) || $now->lt($spring)) {
            $data['dallas_season'] = 'Winter';
        } else if ($now->gte($fall)) {
            $data['dallas_season'] = 'Fall';
        } else if ($now->gte($summer)) {
            $data['dallas_season'] = 'Summer';
        } else {
            $data['dallas_season'] = 'Spring';
        }

        return $data;
	}
}
